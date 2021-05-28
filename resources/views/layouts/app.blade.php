<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <link href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/ck_editor.css')}}" rel="stylesheet">
    <title>@yield('title', 'MBTI')</title>
</head>
<body class="bg-gray-100 h-screen">
<header class="relative bg-blue-300 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center py-3 md:justify-start md:space-x-10">
            @include('layouts.sidemenu')
            <div class="md:w-2/12 md:flex-initial w-0 flex-1 text-2xl">
                <i class="xi-bars cursor-pointer hover:text-gray-50" onclick="openNav()"></i>
            </div>
            <div class="md:pr-0 pr-4">
                <a href="{{route('home')}}">
                    <button class="hover:text-gray-50 text-2xl">MBTI</button>
                </a>
            </div>
            <nav class="hidden md:block md:flex-1 space-x-6 text-base">
                <a href="{{route('mbtis.index')}}"><button class="hover:text-gray-50">성격유형</button></a>
                <a href="{{route('frees.index')}}"><button class="hover:text-gray-50">자유게시판</button></a>
                <a href="{{route('suggests.index')}}" ><button class="hover:text-gray-50">건의게시판</button></a>
            </nav>
            <div class="flex-initial space-x-4 text-base text-right">
                @guest
                    <a href="{{route('login')}}"><button class="bg-gray-50 hover:bg-blue-500 hover:text-gray-50 py-1 px-3 rounded-xl">로그인</button></a>
                @endguest
                @auth()
                    <div class="relative inline-block">
                        <button class="hover:text-gray-100" onclick="openDropdown()"><i class="xi-profile text-4xl pt-1"></i></button>
                        <div id="dropdownMenu" class="w-48 right-2 top-12 hidden absolute bg-white shadow-md rounded-md px-2">
                            <a href="{{route('info', auth()->user()->id)}}" class="hover:no-underline">
                                <button class="block w-full py-1 border-b border-gray-200">마이페이지</button></a>
                            <a href="{{route('user.post', auth()->user()->id)}}" class="hover:no-underline">
                                <button class="block w-full py-1 border-b border-gray-200">작성 게시글</button></a>
                            <a href="{{route('user.comment', auth()->user()->id)}}" class="hover:no-underline">
                                <button class="block w-full py-1 border-b border-gray-200">작성 댓글</button></a>
                            <form action="{{route('logout')}}" method="post" class="inline-block w-full text-center">
                                @csrf
                                <button type="submit" class="block w-full py-1 border-b border-gray-200">로그아웃</button></form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>

<section class="bg-white w-full min-h-full mx-auto shadow-md pb-16 xl:w-8/12">
    @section('container')
    @show
</section>
<footer class="w-full bg-blue-300 h-32 shadow-md">
    <div class="xl:max-w-7xl mx-auto pt-6 text-base">
        copyright
    </div>
</footer>

</body>
</html>
