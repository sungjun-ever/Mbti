@extends('layouts.app')

@section('container')
    <div class="flex pt-8 mx-auto min-h-full">
        <div class="w-full">
            <div class="flex flex-row text-base pt-8 px-8 pb-4">
                <a href="{{route('info', auth()->user()->id)}}" class="mr-2"><button class="hover:text-blue-300
                bg-blue-200 px-1 py-1 rounded-md">회원정보</button></a>
                <a href="{{route('user.post', auth()->user()->id)}}" class="mr-2"><button class="hover:text-blue-300
                bg-blue-200 px-1 py-1 rounded-md">작성 게시글</button></a>
                <a href="{{route('user.comment', auth()->user()->id)}}"><button class="hover:text-blue-300
                bg-blue-200 px-1 py-1 rounded-md">작성 댓글</button></a>
            </div>

            <div class="border">
                <div class="py-4 pl-8">
                    <div class="text-lg font-bold">회원정보</div>
                    <div class="mt-4 text-base">
                        <div>이름 : {{auth()->user()->name}}</div>
                        <div class="pt-2">이메일 : {{auth()->user()->email}}</div>
                        <div class="pt-2">가입날짜 : {{auth()->user()->created_at->format('Y-m-d')}}</div>
                    </div>
                    <div class="mt-4">
                        <a href="{{route('password.reset', auth()->user()->id)}}">
                            <button class="bg-green-500 hover:bg-green-800 px-1 py-1 text-gray-50 rounded-lg">비밀번호 변경</button></a>
                        <a href="{{route('user.destroy', auth()->user()->id)}}">
                            <button class="bg-red-500 hover:bg-red-800 px-1 py-1 text-gray-50 rounded-lg">계정 삭제</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
