<div id="mySidenav"
     class="flex flex-column h-full w-2/3 md:w-4/12 xl:w-2/12 position-fixed z-10 top-0 left-0
             overflow-x-hidden bg-gray-50 hidden shadow-lg">
        @guest
        <div class="bg-blue-400 py-4 items-center">
            <div class="text-center text-base text-gray-50 hover:text-gray-50">
                <a href="{{route('login')}}">
                    <button>로그인 및 회원가입</button></a>
            </div>
        </div>
        @endguest
        @auth()
        <div class="flex bg-blue-400 py-4 items-center text-base space-x-4">
            <div class="flex-initial pl-2 md:pl-4 text-center">
                <a href="{{route('info', auth()->user()->id)}}"><i class="xi-profile-o md:text-5xl text-4xl hover:text-blue-500"></i></a>
            </div>
            <div class="flex-1 text-base">
                <span>{{auth()->user()->name}}</span>
                <p>{{auth()->user()->email}}</p>
            </div>
        </div>
        @endauth

    @auth()
    {{--  유저 메뉴    --}}
    <div class="bg-blue-300 flex text-center">
        <a href="{{route('info', auth()->user()->id)}}" class="flex-1 hover:text-gray-50"><button class="py-3">마이페이지</button></a>
        <a href="{{route('user.post', auth()->user()->id)}}" class="flex-1 sm:w-0 hover:text-gray-50"><button class="py-3">작성 글</button></a>
        <form action="{{route('logout')}}" method="post" class="flex-1 py-3">
            @csrf
            <button class="hover:text-gray-50">로그아웃</button>
        </form>
    </div>
    @endauth
    <div class="pt-8">
        <div class="border-b border-gray-200 py-2 pl-3 text-black text-base font-bold">
            <a href="{{route('mbtis.index')}}"><button class="text-md text-center hover:text-blue-500" value="hidden">성격유형</button></a>
        </div>

        {{--  자유게시판  --}}
        <div class="border-b border-gray-200 py-2 pl-3 text-black text-base font-bold">
            <a href="{{route('frees.index')}}">
                <button class="hover:text-blue-500">자유게시판</button>
            </a>
        </div>

        {{--  건의게시판  --}}
        <div class="border-b border-gray-200 py-2 pl-3 text-black text-base font-bold">
            <a href="{{route('suggests.index')}}">
                <button class="hover:text-blue-500">건의게시판</button>
            </a>
        </div>
    </div>
</div>
