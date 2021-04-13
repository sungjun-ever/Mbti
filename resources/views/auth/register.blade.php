@extends('layouts.app')

@section('container')
    <form action="{{route('register')}}" method="post" class="w-1/2 mx-auto pt-24">
        @csrf
        <div class="pt-8 pb-4 px-1 shadow-md">
        <div>
            <label for="email" class="text-lg">이메일</label>
            <input id="email" type="email" name="email" class="w-full py-2 shadow-sm rounded-sm pl-2 text-lg">
        </div>
        <div class="mt-4">
            <label for="password" class="text-lg">비밀번호</label>
            <input id="password" type="password" name="password" class="w-full py-2 shadow-sm rounded-sm pl-2 text-lg">
            <div class="mt-2 text-red-400 ml-2">* 비밀번호는 8~12글자입니다.</div>
        </div>
        <div class="mt-4">
            <label for="password" class="text-lg">비밀번호 확인</label>
            <input id="password" type="password" name="password_confirmation" class="w-full py-2 shadow-sm rounded-sm pl-2 text-lg">
        </div>
        <div class="mt-4">
            <label for="name" class="text-lg">이름</label>
            <input id="name" type="text" name="name" class="w-full py-2 shadow-sm rounded-sm pl-2 text-lg">
        </div>
        <div class="mt-8 text-center">
            <button type="submit"
                    class="px-3 py-1 mr-4 bg-blue-500 hover:bg-blue-800 text-gray-50 text-lg rounded-lg ">가입</button>
            <button class="px-3 py-1 bg-red-500 hover:bg-red-800 text-gray-50 text-lg rounded-lg">취소</button>
        </div>
        </div>
    </form>
@stop
