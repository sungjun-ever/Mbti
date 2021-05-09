@extends('layouts.app')


@section('container')
    <div class="pt-16 xl:w-10/12 mx-auto min-h-full">
        <div class="flex w-full">

            <div class="flex-initial flex flex-column text-base pt-8 px-8 border" style="min-height: 300px">
                <div class="">
                    <a href="{{route('info', auth()->user()->id)}}"><button class="hover:text-blue-300">회원정보</button></a>
                </div>
                <div class="mt-4">
                    <a href="{{route('user.post', auth()->user()->id)}}"><button class="hover:text-blue-300">작성 게시글</button></a>
                </div>
                <div class="mt-4">
                    <a href="{{route('user.comment', auth()->user()->id)}}"><button class="hover:text-blue-300">작성 댓글</button></a>
                </div>
            </div>

            <div class="flex-1 border">
                <div class="pt-8 w-2/3 mx-auto">
                    <div class="text-lg font-bold">회원정보</div>
                    <div class="mt-4 text-base">
                        <div>이름 : {{auth()->user()->name}}</div>
                        <div class="pt-2">이메일 : {{auth()->user()->email}}</div>
                        <div class="pt-2">가입날짜 : {{auth()->user()->created_at->format('Y-m-d')}}</div>
                    </div>
                    <div class="mt-4">
                        <form action="{{route('password.reset', auth()->user()->id)}}" method="get" class="inline-block">
                            @csrf
                            <input type="hidden" name="mid" value="change">
                            <button type="submit" class="bg-green-500 hover:bg-green-800 px-1 py-1 text-gray-50 rounded-lg">비밀번호 변경</button>
                        </form>
                        <form action="{{route('user.destroy', auth()->user()->id)}}" method="get" class="inline-block">
                            @csrf
                            <input type="hidden" name="mid" value="delete">
                            <button type="submit" class="bg-red-500 hover:bg-red-800 px-1 py-1 text-gray-50 rounded-lg">계정 삭제</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
