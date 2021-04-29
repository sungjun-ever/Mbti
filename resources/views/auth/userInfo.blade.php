@extends('layouts.app')


@section('container')
    <div class="pt-16 xl:w-10/12 mx-auto min-h-full">
        <div class="flex w-full">
            <div class="flex-initial flex flex-column text-lg pt-8 px-8 border">
                <div class="">
                    <a href="{{route('info')}}"><button class="hover:text-blue-300">회원정보</button></a>
                </div>
                <div class="mt-4">
                    <a href="#"><button class="hover:text-blue-300">작성 게시글</button></a>
                </div>
                <div class="mt-4">
                    <a href="#"><button class="hover:text-blue-300">작성 댓글</button></a>
                </div>
            </div>
            <div class="flex-1 h-screen border">
                <div>회원정보</div>
            </div>
        </div>
    </div>
@stop
