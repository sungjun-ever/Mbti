<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'MBTI')</title>
</head>
<body class="bg-gray-100">
<header class="flex bg-blue-300 h-16 align-items-center shadow-md">
    <div id="mySidenav"
         class="flex flex-column h-full w-2/12 position-fixed z-0 top-0 left-0
             overflow-x-hidden bg-gray-50 hidden">
        <div class="h-16 text-right py-3 pr-3">
            <button class="hover:text-blue-300 text-xl" onclick="closeNav()">X</button>
        </div>
        <div>
            <div id="openSubBtn" class="bg-blue-300 py-2 pl-3 text-white rounded" onclick="openSubNav()">
                <button class="text-md text-center hover:text-blue-500">성격유형</button>
            </div>
            <div id="closeSubBtn" class="bg-blue-300 py-2 pl-3 text-white rounded hidden" onclick="closeSubNav()">
                <button class="text-md text-center hover:text-blue-500">성격유형</button>
            </div>
            <div id="mbtiNav" class="py-2 hidden pl-2 bg-white shadow-md">
                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ENFJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ENFP
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ENTJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ENTP
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ESFJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ESFP
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ESTJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ESTP
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    INFJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    INFP
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    INTJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    INTP
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ISFJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ISFP
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ISTJ
                </a>

                <a href="#" class="hover:text-blue-300 py-2 xl:inline-block block">
                    ISTP
                </a>
            </div>
            <div class="bg-blue-300 py-2 mt-1 text-white rounded">
                <a href="{{route('frees.index')}}" class="inline-block pl-3">
                    <button class="hover:text-blue-500">자유게시판</button>
                </a>
            </div>
            <div class="bg-blue-300 py-2 mt-1 text-white rounded">
                <a href="{{route('suggests.index')}}" class="inline-block pl-3">
                    <button class="hover:text-blue-500">건의게시판</button>
                </a>
            </div>
        </div>
    </div>
    <div class="w-3/12 text-2xl">
        <i class="xi-bars pl-4 cursor-pointer hover:text-gray-50" onclick="openNav()"></i>
    </div>
    <div class="flex w-5/12">
        <div>
            <a href="{{route('home')}}">
                <button class="hover:text-gray-50 xl:text-xl text-lg">MBTI</button>
            </a>
        </div>
        <div class="ml-4 xl:text-md text-base pt-1 xl:block hidden">
            <a href="{{route('mbtis.index')}}" >
                <button class="hover:text-gray-50">성격유형</button>
            </a>
            <a href="{{route('frees.index')}}" >
                <button class="hover:text-gray-50 ml-3">자유게시판</button>
            </a>
            <a href="{{route('suggests.index')}}" >
                <button class="hover:text-gray-50 ml-3">건의게시판</button>
            </a>
        </div>
    </div>
    <div class="w-2/12 text-right xl:text-lg text-md">
        @guest
            <a href="{{route('loginPage')}}" class="mr-2">
                <button class="hover:text-gray-50">로그인</button>
            </a>
            <a href="{{route('registerPage')}}">
                <button class="hover:text-gray-50">회원가입</button>
            </a>
        @endguest
        @auth()
            <a href="#" class="mr-2">
                <button class="hover:text-gray-50">{{auth()->user()->name}}</button>
            </a>
            <form action="{{route('logout')}}" method="post" class="inline-block">
                @csrf
                <button class="hover:text-gray-50">로그아웃</button>
            </form>
        @endauth
    </div>
    <div class="w-3/12"></div>
</header>

<section class="bg-white min-h-80 w-full mx-auto shadow-md pb-16 xl:w-7/12">
    @section('container')
    @show
</section>
<footer class="min-h-full w-7/12 mx-auto pt-8">
    Copyright<br>

</footer>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.display = "block";
    }
    function closeNav() {
        document.getElementById('mySidenav').style.display = "none";
    }
    function openSubNav() {
        document.getElementById('mbtiNav').style.display = 'block';
        document.getElementById('openSubBtn').style.display = 'none';
        document.getElementById('closeSubBtn').style.display = 'block';
    }
    function closeSubNav() {
        document.getElementById('mbtiNav').style.display = 'none';
        document.getElementById('closeSubBtn').style.display = 'none';
        document.getElementById('openSubBtn').style.display = 'block';
    }
</script>
</body>
</html>
