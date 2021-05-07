<div id="{{$id}}replyBox" class="pt-3 w-10/12 ml-auto hidden">
    <form action="{{route($cmt->board_name.'.comments.reply.store', [$cmt->board_id, $id])}}" method="post">
        @csrf
        <label for="story" class="hidden"></label>
        <textarea id="story" name="story" class="w-full border-2 border-blue-300 pl-2 pt-2 rounded-sm outline-none resize-none" rows="4"></textarea>
        <div class="mt-4 text-right">
            <button type="submit" class="px-3 py-2 bg-blue-400 hover:bg-blue-600 text-gray-50 rounded-sm">작성</button>
        </div>
    </form>
</div>
