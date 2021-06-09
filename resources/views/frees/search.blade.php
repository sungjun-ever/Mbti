@extends('layouts.app')

@section('container')
    <div class="pt-12 min-h-30">
        <div class="mb-4">
            <span class="text-xl pl-1">검색 내용 "{{$search}}"</span>
        </div>
        <table class="w-full table-fixed">
            <tr>
                <td class="w-1/12"></td>
                <td class="w-5/12"></td>
                <td class="md:w-2/12"></td>
                <td class="w-1/12 xl:table-cell hidden"></td>
            </tr>
            @foreach($posts as $post)
                <tr class="border-b">
                    <td class="pl-2 text-center">{{$post->board_name}}</td>
                    <td class="py-1 text-base truncate">
                        <a href="{{route($post->board_name.'.show', $post->id)}}"
                           class="hover:no-underline hover:text-green-800" >{{$post->title}}</a>
                    </td>
                    <td class="text-center xl:text-base text-xs truncate">{{$post->user->name}}</td>
                    <td class="w-1/12 xl:table-cell text-center hidden">{{$post->created_at->format('y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-16">
        {{$posts->appends(['content'=>$content, 'search'=>$search])->links()}}
    </div>
@stop
