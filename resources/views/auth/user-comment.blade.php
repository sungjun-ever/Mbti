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
                <div class="py-4 w-11/12 ml-auto">
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
