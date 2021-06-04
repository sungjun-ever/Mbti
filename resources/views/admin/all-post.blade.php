@extends('layouts.master')

@section('container')
    <div class="pt-6">
        <div class="flex pb-6 pl-2 items-center space-x-4">
            <div class="text-lg">게시물</div>
            <form action="#" method="get" class="inline-block">
                @csrf
                <select name="content" class="border-2 border-green-my focus:outline-none">
                    <option value="title">제목</option>
                    <option value="group">분류</option>
                </select>
                <input type="search" name="search" class="border-2 border-green-my focus:outline-none rounded-md pl-1">
                <button><i class="xi-search text-lg hover:text-green-800"></i></button>
            </form>
        </div>
        <table class="w-full table-fixed">
            <tr class="border-b-2 border-t-2 text-center">
                <td class="w-1/12">번호</td>
                <td class="w-2/12">분류</td>
                <td class="w-2/12">이름</td>
                <td class="w-3/12">제목</td>
                <td class="w-2/12">작성 날짜</td>
                <td class="w-1/12">이동</td>
                <td class="w-1/12">복구</td>
            </tr>
            @foreach($all as $post)
                <tr class="text-center h-10 border-b">
                    <td>{{$post->id}}</td>
                    <td>{{$post->board_name}}</td>
                    <td>{{$post->user->name}}</td>
                    <td class="truncate">
                        @if(in_array($post->board_name, $mbtiGroup))
                            <a href={{'../mbti/'.$post->board_name.'/'.$post->id}}>{{$post->title}}</a>
                        @else
                            <a href={{'../'.$post->board_name.'/'.$post->id}}>{{$post->title}}</a>
                        @endif
                    </td>
                    <td>{{(new \Carbon\Carbon($post->created_at))->format('Y-m-d')}}</td>
                    <td>
                        <form action="{{route('admin.post.move', [$post->board_name, $post->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$post->user_id}}">
                            <input type="hidden" name="title" value="{{$post->title}}">
                            <input type="hidden" name="story" value="{{$post->story}}">
                            @if($post->moved == 'move')
                                <span>
                                    <i class="xi-check text-black text-xl"></i>
                                </span>
                            @else
                                <button type="submit" onclick="if(!confirm('임시게시판으로 이동시키겠습니까?')) return false">
                                    <i class="xi-check text-green-400 hover:text-red-500 text-xl"></i>
                                </button>
                            @endif
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.post.move', [$post->board_name, $post->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$post->user_id}}">
                            <input type="hidden" name="title" value="{{$post->title}}">
                            <input type="hidden" name="story" value="{{$post->story}}">
                            @if($post->moved == 'move')
                                <button type="submit" onclick="if(!confirm('복구하시겠습니까?')) return false">
                                    <i class="xi-check text-green-400 hover:text-red-500 text-xl"></i>
                                </button>
                            @else
                                <span>
                                    <i class="xi-check text-black text-xl"></i>
                                </span>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="mt-8">{{$all->links()}}</div>
    </div>
@stop
