<div id="mySidenav"
     class="flex flex-column h-full w-5/12 xl:w-2/12 position-fixed z-10 top-0 left-0
             overflow-x-hidden bg-gray-50 hidden shadow-lg px-1">
    <div class="h-16 text-right py-3 pr-3">
        <button class="hover:text-blue-300 text-xl" onclick="closeNav()">X</button>
    </div>
    <div class="my-4 py-3 bg-blue-300 text-base text-white text-center flex justify-around rounded">
        @guest
            <a href="{{route('login')}}" class="mr-2"><button class="hover:text-blue-500">로그인</button></a>
            <a href="{{route('register')}}"><button class="hover:text-blue-500">회원가입</button></a>
        @endguest
        @auth()
            <a href="{{route('info', auth()->user()->id)}}" class="mr-2"><button class="hover:hover:text-blue-500">{{auth()->user()->name}}</button></a>
            <form action="{{route('logout')}}" method="post" class="inline-block">
                @csrf
                <button class="hover:text-blue-500">로그아웃</button>
            </form>
        @endauth
    </div>
    <div>
        <div class="bg-blue-300 py-2 pl-3 text-white rounded" onclick="subNavBtnClick()">
            <button id="subNavBtn" class="text-md text-center hover:text-blue-500" value="hidden">성격유형</button>
        </div>
        {{--  성격 유형 메뉴  --}}
        <div id="mbtiNav" class="py-2 hidden pl-2 bg-white shadow-md">
            <a href="{{route('enfj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ENFJ
            </a>

            <a href="{{route('enfp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ENFP
            </a>

            <a href="{{route('entj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ENTJ
            </a>

            <a href="{{route('entp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ENTP
            </a>

            <a href="{{route('esfj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ESFJ
            </a>

            <a href="{{route('esfp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ESFP
            </a>

            <a href="{{route('estj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ESTJ
            </a>

            <a href="{{route('estp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ESTP
            </a>

            <a href="{{route('infj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                INFJ
            </a>

            <a href="{{route('infp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                INFP
            </a>

            <a href="{{route('intj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                INTJ
            </a>

            <a href="{{route('intp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                INTP
            </a>

            <a href="{{route('isfj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ISFJ
            </a>

            <a href="{{route('isfp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ISFP
            </a>

            <a href="{{route('istj.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ISTJ
            </a>

            <a href="{{route('istp.index')}}" class="hover:text-blue-300 py-2 xl:inline-block block">
                ISTP
            </a>
        </div>
        {{--  자유게시판  --}}
        <div class="bg-blue-300 py-2 mt-1 text-white rounded">
            <a href="{{route('frees.index')}}" class="inline-block pl-3">
                <button class="hover:text-blue-500">자유게시판</button>
            </a>
        </div>

        {{--  건의게시판  --}}
        <div class="bg-blue-300 py-2 mt-1 text-white rounded">
            <a href="{{route('suggests.index')}}" class="inline-block pl-3">
                <button class="hover:text-blue-500">건의게시판</button>
            </a>
        </div>
    </div>
</div>
