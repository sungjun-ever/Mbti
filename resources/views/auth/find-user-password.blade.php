@extends('layouts.app')

@section('container')
    <div class="pt-24">
        <form action="#" method="post" class="w-1/2 mx-auto shadow-md p-4">
            @csrf
            <div class="text-base pb-4">비밀번호 찾기</div>
            <label for="email">아래 빈칸에 이메일을 입력해주세요.</label>
            <input type="email" id="email" name="email"
                   class="w-full py-2 shadow-sm rounded-sm pl-2 text-lg" placeholder="example@mbti.com" autofocus>
            <button type="submit" class="px-4 py-1 bg-blue-500 hover:bg-blue-800 text-gray-50 mt-4">찾기</button>
        </form>
    </div>
@stop
