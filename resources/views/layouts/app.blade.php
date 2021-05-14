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
<header class="relative bg-blue-300 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
            @include('layouts.sidemenu')
            <div class="md:w-2/12 md:flex-initial w-0 flex-1 text-2xl">
                <i class="xi-bars cursor-pointer hover:text-gray-50" onclick="openNav()"></i>
            </div>
            <div class="md:pr-0 pr-4">
                <a href="{{route('home')}}">
                    <button class="hover:text-gray-50 text-2xl">MBTI</button>
                </a>
            </div>
            <nav class="hidden md:block md:flex-1 space-x-3 text-base">
                <a href="{{route('mbtis.index')}}"><button class="hover:text-gray-50">성격유형</button></a>
                <a href="{{route('frees.index')}}"><button class="hover:text-gray-50">자유게시판</button></a>
                <a href="{{route('suggests.index')}}" ><button class="hover:text-gray-50">건의게시판</button></a>
            </nav>
            <div class="flex-initial space-x-4 text-base text-right">
                @guest
                    <a href="{{route('login')}}"><i class="xi-profile-o text-3xl pt-1"></i></a>
                @endguest
                @auth()
                    <a href="{{route('info', auth()->user()->id)}}"><i class="xi-profile text-3xl pt-1"></i></a>
{{--                    <form action="{{route('logout')}}" method="post" class="inline-block">--}}
{{--                        @csrf--}}
{{--                        <button class="hover:text-gray-50">로그아웃</button>--}}
{{--                    </form>--}}
                @endauth
            </div>
        </div>
    </div>
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
