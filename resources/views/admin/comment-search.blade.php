@extends('layouts.master')

@section('container')
    <div class="pt-6">
        <div class="flex pb-6 pl-2 items-center space-x-4">
            <div class="text-lg">댓글</div>
            <form action="{{route('admin.comment.search')}}" method="get" class="inline-block">
                @csrf
                <select name="content" class="border-2 border-green-my focus:outline-none">
                    <option value="user_name">이름</option>
                    <option value="story">내용</option>
                </select>
                <input type="search" name="search" class="border-2 border-green-my focus:outline-none rounded-md pl-1">
                <button><i class="xi-search text-lg hover:text-green-800"></i></button>
            </form>
        </div>
        <table class="w-full table-fixed">
            <tr class="border-b-2 border-t-2 text-center">
                <td class="w-1/12">번호</td>
                <td class="w-2/12">게시판</td>
                <td class="w-2/12">이름</td>
                <td class="w-3/12">내용</td>
                <td class="w-2/12">작성 날짜</td>
            </tr>
            @foreach($all as $post)
                <tr class="text-center h-10 border-b">
                    <td>{{$post->id}}</td>
                    <td>{{$post->board_name}}</td>
                    <td>{{$post->user->name}}</td>
                    <td class="truncate">
                        <a href={{'../'.$post->board_name.'/'.$post->id}}>{{$post->story}}</a>
                    </td>
                    <td>{{(new \Carbon\Carbon($post->created_at))->format('y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
        <div class="mt-8">{{$all->links()}}</div>
    </div>
@stop
