<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/ck_editor.css')}}" rel="stylesheet">
    <title>@yield('title', 'Charters')</title>
</head>
<body class="bg-gray-100 h-screen" style="font-family: 'Noto Sans KR', sans-serif;">
<header class="flex relative bg-green-my shadow-md items-center text-gray-100">
    <div class="flex-1 flex lg:justify-center justify-start lg:pl-0 pl-2 md:py-2 items-center md:space-x-6 space-x-4">
        @include('layouts.sidemenu')
        <i class="xi-bars cursor-pointer hover:text-black md:text-2xl text-xl" onclick="openNav()"></i>
        <a href="{{route('home')}}" class="object-contain"><img src="{{asset('image/logo.png')}}" alt="charters"></a>
    </div>
    <nav class="flex-initial lg:flex space-x-10 text-base pl-2 hidden">
        <a href="{{route('mbtis.index')}}">
            <button class="hover:text-black">성격유형</button>
        </a>
        <a href="{{route('frees.index')}}">
            <button class="hover:text-black">자유게시판</button>
        </a>
        <a href="{{route('suggests.index')}}">
            <button class="hover:text-black">건의게시판</button>
        </a>
    </nav>
    <div class="flex-1 flex text-base text-right lg:justify-center justify-end md:pr-0 pr-4">
        @guest
            <a href="{{route('login')}}" class="text-gray-100 hover:no-underline hover:text-black">로그인</a>
        @endguest
        @auth()
            <div class="relative inline-block">
                <button class="hover:text-black" onclick="openDropdown()"><i
                        class="xi-profile lg:text-4xl text-3xl pt-1"></i></button>
                <div id="dropdownMenu"
                     class="w-48 right-2 top-12 hidden absolute bg-white text-black  shadow-md rounded-md px-2">
                    <a href="{{route('info', auth()->user()->id)}}" class="hover:no-underline hover:text-green-600">
                        <button class="block w-full py-1 border-b border-gray-200">마이페이지</button>
                    </a>
                    <a href="{{route('user.post', auth()->user()->id)}}" class="hover:no-underline hover:text-green-600">
                        <button class="block w-full py-1 border-b border-gray-200">작성 게시글</button>
                    </a>
                    <a href="{{route('user.comment', auth()->user()->id)}}" class="hover:no-underline hover:text-green-600">
                        <button class="block w-full py-1 border-b border-gray-200">작성 댓글</button>
                    </a>
                    <form action="{{route('logout')}}" method="post" class="inline-block w-full text-center hover:text-green-600">
                        @csrf
                        <button type="submit" class="block w-full py-1 border-b border-gray-200">로그아웃</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</header>

<section class="bg-white w-full min-h-full mx-auto shadow-md pb-16 xl:w-8/12">
    @section('container')
    @show
</section>
<footer class="w-full bg-green-my h-32 shadow-md">
    <div class="xl:max-w-7xl mx-auto pt-6 text-base">
        copyright
    </div>
</footer>

</body>
</html>
