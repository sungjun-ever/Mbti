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
<body class="bg-gray-100 h-screen">
<header class="flex bg-blue-300 h-16 align-items-center shadow-md">
    @include('layouts.sidemenu')
    <div class="flex-1 text-2xl">
        <i class="xi-bars pl-4 cursor-pointer hover:text-gray-50" onclick="openNav()"></i>
    </div>
    <div class="flex-initial flex pr-4">
        <div class="flex-initial">
            <a href="{{route('home')}}">
                <button class="hover:text-gray-50 xl:text-xl text-lg">MBTI</button>
            </a>
        </div>
        <div class="flex-initial ml-4 xl:text-md text-base pt-1 md:block hidden">
            <a href="{{route('mbtis.index')}}"><button class="hover:text-gray-50">성격유형</button></a>
            <a href="{{route('frees.index')}}"><button class="hover:text-gray-50 ml-3">자유게시판</button></a>
            <a href="{{route('suggests.index')}}" ><button class="hover:text-gray-50 ml-3">건의게시판</button></a>
        </div>
    </div>
    <div class="flex-1 text-right xl:text-lg text-md hidden md:block">
        @guest
            <a href="{{route('login')}}" class="mr-2"><button class="hover:text-gray-50">로그인</button></a>
            <a href="{{route('register')}}"><button class="hover:text-gray-50">회원가입</button></a>
        @endguest
        @auth()
            <a href="{{route('info', auth()->user()->id)}}" class="mr-2"><button class="hover:text-gray-50">{{auth()->user()->name}}</button></a>
            <form action="{{route('logout')}}" method="post" class="inline-block">
                @csrf
                <button class="hover:text-gray-50">로그아웃</button>
            </form>
        @endauth
    </div>
    <div class="flex-1 hidden xl:block"></div>
</header>

<section class="bg-white w-full min-h-full mx-auto shadow-md pb-16 xl:w-7/12">
    @section('container')
    @show
</section>
<footer class="w-full xl:w-7/12 min-h-30 mx-auto pt-8">
    Copyright
</footer>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.display = "block";
    }
    function closeNav() {
        document.getElementById('mySidenav').style.display = "none";
    }
    function subNavBtnClick(){
        let subNavBtn = document.querySelector('#subNavBtn');
        if(subNavBtn.value === 'hidden'){
            document.getElementById('mbtiNav').style.display = 'block';
            subNavBtn.value = 'show';
        } else {
            document.getElementById('mbtiNav').style.display = 'none';
            subNavBtn.value = 'hidden';
        }
    }

</script>
</body>
</html>
