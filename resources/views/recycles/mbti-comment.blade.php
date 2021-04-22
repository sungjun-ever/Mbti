{{--댓글 목록--}}
<div class="w-10/12 border-t-4 border-blue-300 mx-auto">
    <div class="pt-4 pb-16" >
        @foreach($cmts as $cmt)
            <div class="mt-4 shadow-md" style="min-height: 120px;">
                <div class="bg-blue-300 text-md text-white py-1 pl-2 rounded-sm">{{$cmt->user_name}}</div>
                <div class="pt-2 pl-2 text-base rounded-sm" style="min-height: 80px;">{{$cmt->story}}</div>
                @auth()
                <div class="py-1 text-right text-base">
                    <div class="pr-2 inline-block">
                        <button id="{{$cmt->id}}" class="hover:text-blue-300" onclick="commentReply(this)" value="hidden">답글</button>
                    </div>
                    @if($cmt->user_id == auth()->user()->id)
                        <div class="pr-2 inline-block">
                            <button class="hover:text-blue-300">삭제</button>
                        </div>
                    @endif
                </div>
                @endauth
            </div>
        {{--  댓글 답글   --}}
            <div id="{{$cmt->id}}box" class="pt-3 w-4/5 ml-auto hidden">
                <form action="{{route($mbti->mbtiSort.'.comments.reply.store', $mbti->id, $cmt->id)}}" method="post">
                    @csrf
                    <label for="story" class="hidden"></label>
                    <textarea id="story" name="story" class="w-full border-2 border-blue-300 pl-2 pt-2 rounded-sm outline-none resize-none" rows="4"></textarea>
                    <div class="mt-4 text-right">
                        <button type="submit" class="px-3 py-2 bg-blue-400 hover:bg-blue-600 text-gray-50 rounded-sm">작성</button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>

{{--  댓글 페이지네이션  --}}
    <div class="pb-4">
        {{$cmts->links()}}
    </div>

{{--  댓글 작성  --}}
    @auth()
        <div class="border-t-4 border-b-4 border-gray-300 py-8">
        <form action="{{route($mbti->mbtiSort.'.comments.store', $mbti->id)}}" method="post">
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
        let replyBoxId = e.id + 'box';
        if(e.value === "hidden") {
            document.getElementById(replyBoxId).style.display = 'block';
            e.value = "show";
        } else {
            document.getElementById(replyBoxId).style.display = 'none';
            e.value = "hidden";
        }
    }
</script>


