{{-- 사용자 정보 화면 메뉴 --}}
<div class="flex flex-row text-base pt-8 pb-4 md:pl-4 space-x-4">
    <a href="{{route('info', auth()->user()->id)}}" class="mr-2"><button
            class="bg-green-my text-gray-50 hover:bg-green-800 hover:text-white px-1 py-1 rounded-md">회원정보</button></a>
    <a href="{{route('user.post', auth()->user()->id)}}" class="mr-2"><button
            class="bg-green-my text-gray-50 hover:bg-green-800 hover:text-white px-1 py-1 rounded-md">작성 게시글</button></a>
    <a href="{{route('user.comment', auth()->user()->id)}}"><button
            class="bg-green-my text-gray-50 hover:bg-green-800 hover:text-white px-1 py-1 rounded-md">작성 댓글</button></a>
</div>
