<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('script')
    @show
    <script src="{{asset('js/main.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/default.css')}}" rel="stylesheet">
    <title>@yield('title', 'Admin Page')</title>
</head>
<body class="bg-gray-50">

<header class="flex relative bg-green-my shadow-sm items-center text-gray-100">
    <div class="flex-1 flex lg:justify-center justify-start lg:pl-0 pl-2 py-2 items-center">
        <a href="{{route('home')}}" class="object-contain"><img src="{{asset('image/logo.png')}}" alt="charters"></a>
    </div>
    <div class="flex-1 flex text-base text-right lg:justify-center justify-end">
        @guest
            <a href="{{route('login')}}" class="text-gray-100 hover:no-underline hover:text-black">
                <button>로그인</button></a>
        @endguest
        @auth()
            <div class="flex items-center space-x-4">
                <span>{{auth()->user()->name}}</span>
                <form action="{{route('logout')}}" method="post" class="inline-block text-center">
                    @csrf
                    <button type="submit" class="hover:text-black">로그아웃</button>
                </form>
            </div>
        @endauth
    </div>
</header>
<section class="lg:w-7/12 w-full bg-white min-h-screen mx-auto shadow-md pb-10">
    <nav class="flex h-12 items-center border-b border-green-my">
        <a href="{{route('admin.getUser')}}" class="inline-grid h-full hover:no-underline hover:text-gray-50
        px-3 border-r border-gray-200 hover:shadow-lg transition duration-300 ease-in-out transform hover:bg-green-my">
            <button>사용자 정보</button></a>
        <a href="{{route('admin.get.post')}}" class="inline-grid h-full hover:no-underline hover:text-gray-50
        px-3 border-r border-gray-200 hover:shadow-lg transition duration-300 ease-in-out transform hover:bg-green-my">
            <button>게시물</button></a>
        <a href="{{route('admin.get.comment')}}" class="inline-grid h-full hover:no-underline hover:text-gray-50
        px-3 border-r border-gray-200 hover:shadow-lg transition duration-300 ease-in-out transform hover:bg-green-my">
            <button>댓글</button></a>
    </nav>
    @section('container')
    @show
</section>
<footer class="w-full h-16 bg-green-my"></footer>
</body>
</html>
