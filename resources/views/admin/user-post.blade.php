@extends('layouts.master')

@section('container')
    <div class="pt-6">
        {{--  유저 게시물 목록 --}}
        <table class="w-full table-fixed">
            <tr class="border-b-2 border-t-2 text-center">
                <td class="w-1/12">번호</td>
                <td class="w-2/12">게시판</td>
                <td class="w-2/12">이름</td>
                <td class="w-3/12">제목</td>
                <td class="w-2/12">작성 날짜</td>
            </tr>
            @foreach($all as $post)
                <tr class="text-center h-10 border-b">
                    <td>{{$post->id}}</td>
                    <td>{{$post->board_name}}</td>
                    <td>{{$post->user->name}}</td>
                    <td class="truncate">
                        <a href={{route($post->board_name.'.show', $post->id)}}>{{$post->title}}</a>
                    </td>
                    <td>{{(new \Carbon\Carbon($post->created_at))->format('y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
        <div class="mt-8">{{$all->links()}}</div>
    </div>
@stop
