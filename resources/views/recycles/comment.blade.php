{{--댓글 목록--}}
<div class="w-10/12 border-t-4 border-blue-300 mx-auto">
    <div class="pt-4 pb-16" >
        @foreach($cmts as $cmt)
                <div class="mt-4 shadow-md @if($cmt->class != 0) w-10/12 ml-auto @endif" style="min-height: 80px;">
                    <div id="{{$cmt->id}}cmtBox">
                        <div class="bg-blue-300 text-md text-white py-1 pl-2 rounded-sm">{{$cmt->user->name}}</div>
                            <div class="pt-2 pl-2 " style="min-height: 80px;">
                                @if($cmt->status == 'delete')
                                    <div class="text-base rounded-sm text-gray-400 font-semibold" style="min-height: 50px;">[삭제된 댓글입니다.]</div>
                                @else
                                    <div class="text-base rounded-sm" style="min-height: 50px;">{{$cmt->story}}</div>
                                @endif
                            </div>
                        @auth()
                        <div class="py-1 text-right text-base">
                            <div class="pr-2 inline-block">
                                <button id="{{$cmt->id}}" class="hover:text-blue-300" onclick="commentReply(this)" value="hidden">답글</button>
                            </div>
                            @if($cmt->user_id == auth()->user()->id)
                                <div class="pr-2 inline-block">
                                    <button id="{{$cmt->id}}" class="hover:text-blue-300 pr-2" onclick="editComment(this)" value="hidden">수정</button>
                                    <form action="{{route($post->board_name.'.comments.destroy', [$post->id, $cmt->id])}}" method="post" class="inline-block">
                                        @csrf
                                        <button type="submit" class="hover:text-blue-300">삭제</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        @endauth
                    </div>
                    {{--  댓글 수정   --}}
                    <div id="{{$cmt->id}}editBox" class="py-8 hidden">
                        <form action="{{route($post->board_name.'.comments.update', [$post->id, $cmt->id])}}" method="post">
                            @csrf
                            @method('put')
                            <label for="story" class="hidden"></label>
                            <textarea id="story" name="story"
                                      class="w-full border-2 border-blue-300 pl-2 pt-2
                                      rounded-sm outline-none resize-none" rows="4">{{$cmt->story}}</textarea>
                            <div class="mt-4 text-right">
                                <button type="submit" class="px-3 py-2 bg-blue-400 hover:bg-blue-600 text-gray-50 rounded-sm">수정</button>
                                <button id="{{$cmt->id}}" type="button"
                                        class="px-3 py-2 bg-red-400 hover:bg-red-600 text-gray-50 rounded-sm" onclick="editCancel(this)">취소</button>
                            </div>
                        </form>
                    </div>
                </div>
            {{--대댓글 작성--}}
            @include('recycles.reply', ['cmt'=>$cmt,'id'=>$cmt->id])
        @endforeach
    </div>

{{--  댓글 페이지네이션  --}}
    <div class="pb-4">
        {{$cmts->links()}}
    </div>

{{--  댓글 작성  --}}
    @auth()
        <div class="border-t-4 border-b-4 border-gray-300 py-8">
        <form action="{{route($post->board_name.'.comments.store', $post->id)}}" method="post">
            @csrf
            <label for="story" class="hidden"></label>
            <textarea id="story" name="story" class="w-full border-2 border-blue-300 pl-2 pt-2 rounded-sm outline-none resize-none" rows="4"></textarea>
            <div class="mt-4 text-right">
                <button type="submit" class="px-3 py-2 bg-blue-400 hover:bg-blue-600 text-gray-50 rounded-sm">작성</button>
            </div>
        </form>
        </div>
    @endauth
</div>
<script>
    function commentReply(e) {
        let replyBoxId = e.id + 'replyBox';
        if(e.value === "hidden") {
            document.getElementById(replyBoxId).style.display = 'block';
            e.value = "show";
        } else {
            document.getElementById(replyBoxId).style.display = 'none';
            e.value = "hidden";
        }
    }

    function editComment(e){
        let cmtBox = e.id + 'cmtBox';
        let editBox = e.id + 'editBox';
        document.getElementById(cmtBox).style.display = 'none';
        document.getElementById(editBox).style.display = 'block';
    }

    function editCancel(e){
        let cmtBox = e.id + 'cmtBox';
        let editBox = e.id + 'editBox';
        document.getElementById(cmtBox).style.display = 'block';
        document.getElementById(editBox).style.display = 'none';
    }

</script>


