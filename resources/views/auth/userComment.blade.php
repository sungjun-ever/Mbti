@extends('layouts.app')

@section('container')
    <div class="pt-16 mx-auto min-h-full">
        <div class="flex w-full">
            <div class="flex-initial flex flex-column text-base pt-8 px-8 border" style="min-height: 300px">
                <div class="">
                    <a href="{{route('info', auth()->user()->id)}}"><button class="hover:text-blue-300">회원정보</button></a>
                </div>
                <div class="mt-4">
                    <a href="{{route('userPost', auth()->user()->id)}}"><button class="hover:text-blue-300">작성 게시글</button></a>
                </div>
                <div class="mt-4">
                    <a href="{{route('userComment', auth()->user()->id)}}"><button class="hover:text-blue-300">작성 댓글</button></a>
                </div>
            </div>
            <div class="flex-1 border">
                <div class="pt-8 w-11/12 ml-auto">
                    <div class="text-lg font-bold">작성 댓글</div>
                    <div class="mt-4 p-2 xl:w-8/12 w-full">
                        @foreach($cmts as $cmt)
                            <div class="border-b border-gray-200 py-1">
                                <a href="{{route($cmt->board_name.'.show', $cmt->board_id)}}">{{$cmt->story}}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="py-4">{{$cmts->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@stop
