@extends('layouts.app')

@section('container')
    <div class="flex pt-8 mx-auto min-h-full">
        <div class="w-full">
            @include('recycles.user-navi')
            <div class="border">
                <div class="py-4 w-11/12 ml-auto">
                    <div class="text-lg font-bold">작성 게시글</div>
                    <div class="mt-4 p-2 xl:w-8/12 w-full">
                        @foreach($posts as $post)
                            <div class="border-b border-gray-200 py-1">
                                <a href="{{route($post->board_name.'.show', $post->id)}}">{{$post->title}}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="py-4">{{$posts->onEachSide(1)->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@stop
