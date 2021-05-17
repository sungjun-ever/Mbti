@extends('layouts.app')

@section('container')
    <form action="{{route('login')}}" method="post" class="md:w-5/12 w-full mx-auto pt-24">
        @csrf
        <div class="py-4 lg:px-2 shadow-md">
            <div>
                <label for="email" class="text-lg">이메일</label>
                <input id="email" type="email" name="email" autofocus
                       value="{{old('email') ? old('email') : ''}}"
                       class="w-full py-2 shadow-sm rounded-sm pl-2 text-lg border border-gray-100
                                @error('email') border-2 border-red-600 @enderror">
            </div>
            <div class="mt-4">
                <label for="password" class="text-lg">비밀번호</label>
                <input id="password" type="password" name="password"
                       class="w-full py-2 shadow-sm rounded-sm pl-2 text-lg border border-gray-100
                                @error('password') border-2 border-red-600 @enderror">
            </div>
            <div class="mt-4">
                <a href="http://127.0.0.1:8000/login/google">
                    <img src="{{asset('image/btn_google_signin_dark_normal_web.png')}}" alt="구글 로그인" class="w-40"></a>
            </div>
            <div class="mt-4">
                <label for="remember"></label>
                <input id="remember" type="checkbox" name="remember_me" class="w-5 h-5">
                <span class="inline-block text-lg h-8">로그인 유지</span>
                <div class="h-8 mt-2 text-right space-x-4">
                    <a href="{{route('register')}}">
                        <button type="button" class="text-base text-blue-300 hover:text-blue-500">회원가입</button></a>
                    <a href="{{route('password.request')}}">
                        <button type="button" class="text-base text-blue-300 hover:text-blue-500">비밀번호 찾기</button>
                    </a>
                </div>
            </div>
            <div class="mt-8 text-center space-x-10">
                <button type="submit"
                        class="px-3 py-1 bg-blue-500 hover:bg-blue-800 text-gray-50 text-lg rounded-lg ">로그인
                </button>
                <button class="px-3 py-1 bg-red-500 hover:bg-red-800 text-gray-50 text-lg rounded-lg">취소</button>
            </div>
        </div>
    </form>
@stop
