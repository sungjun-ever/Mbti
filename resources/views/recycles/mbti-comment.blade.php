
<div class="w-10/12 border-t-4 border-blue-300 mx-auto">
    <div class="pt-4 pb-16">
        @foreach($cmts as $cmt)
            <div class="mt-4 shadow-md">
                <div class="bg-blue-300 text-md text-white py-1 pl-2 rounded-sm">{{$cmt->user_name}}</div>
                <div class="pt-2 pl-2 text-base rounded-sm" style="min-height: 100px;">{{$cmt->story}}</div>
            </div>
        @endforeach
    </div>
    <div class="pb-4">
        {{$cmts->links()}}
    </div>
    @auth()
        <div class="border-t-4 border-b-4 border-gray-300 py-8">
        <form action="{{route('mbtis.'.$mbti->mbtiSort.'.comments.store', $mbti->id)}}" method="post">
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

