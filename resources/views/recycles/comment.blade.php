{{--댓글 목록--}}
<div class="w-10/12 border-t-4 border-green-my mx-auto">
    <div class="pt-4 pb-16" >
        @foreach($cmts as $cmt)
                <div class="mt-4 shadow-md @if($cmt->class != 0) w-10/12 ml-auto @endif" style="min-height: 80px;">
                    <div id="{{$cmt->id}}cmtBox">
                        <div class="bg-green-my text-md text-white py-1 pl-2 rounded-sm">{{$cmt->user_name}}</div>
                            <div class="pt-2 pl-2 " style="min-height: 80px;">
                                @if($cmt->status == 'delete')
                                    <div class="text-base rounded-sm text-gray-400 font-semibold" style="min-height: 50px;">[삭제된 댓글입니다.]</div>
                                @else
                                    <div class="text-base rounded-sm" style="min-height: 50px;">{{$cmt->story}}</div>
                                @endif
                            </div>
                        @auth()
                        <div class="py-1 text-right text-base">
                            @if($cmt->class == 0)
                            <div class="pr-2 inline-block">
                                <button id="{{$cmt->id}}" class="hover:text-green-600" onclick="commentReply(this)" value="hidden">답글</button>
                            </div>
                            @endif
                            @if($cmt->user_id == auth()->user()->id)
                                <div class="pr-2 inline-block">
                                    <button id="{{$cmt->id}}" class="hover:text-green-600 pr-2" onclick="editComment(this)" value="hidden">수정</button>
                                    <form action="{{route($post->board_name.'.comments.destroy', [$post->id, $cmt->id])}}" method="post" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="hover:text-green-600" onclick="if(!confirm('삭제하시겠습니까?')) return false">삭제</button>
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
                                      class="w-full border-2 border-green-my pl-2 pt-2
                                      rounded-sm outline-none resize-none" rows="4">{{$cmt->story}}</textarea>
                            <div class="mt-4 text-right">
                                <button type="submit" class="px-3 py-2 bg-green-my hover:bg-green-800 text-gray-50 rounded-sm">수정</button>
                                <button id="{{$cmt->id}}" type="button"
                                        class="px-3 py-2 bg-red-400 hover:bg-red-600 text-gray-50 rounded-sm" onclick="editCancel(this)">취소</button>
                            </div>
                        </form>
                    </div>
                </div>
            {{--대댓글 작성--}}
            @include('recycles.comment-reply', ['cmt'=>$cmt,'id'=>$cmt->id])
        @endforeach
    </div>

{{--  댓글 페이지네이션  --}}
    <div class="pb-4">
        {{$cmts->links()}}
    </div>

{{--  댓글 작성  --}}
    @auth()
        <div class="border-b-4 border-green-my py-8">
        <form action="{{route($post->board_name.'.comments.store', $post->id)}}" method="post">
            @csrf
            <label for="story" class="hidden"></label>
            <textarea id="story" name="story" class="w-full border-2 border-green-my pl-2 pt-2 rounded-sm outline-none resize-none" rows="4"></textarea>
            <div class="mt-4 text-right">
                <button type="submit" class="px-3 py-2 bg-green-my hover:bg-green-800 text-gray-50 rounded-sm">작성</button>
            </div>
        </form>
        </div>
    @endauth
</div>



