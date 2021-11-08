@extends('layouts.master')

@section('container')
    <div class="pt-6">
        {{--  유저 댓글 목록 --}}
        <table class="w-full table-fixed">
            <tr class="border-b-2 border-t-2 text-center">
                <td class="w-2/12">게시판</td>
                <td class="w-2/12">이름</td>
                <td class="w-3/12">내용</td>
                <td class="w-2/12">작성 날짜</td>
            </tr>
            @foreach($cmts as $cmt)
                <tr class="text-center h-10 border-b">
                    <td>{{$cmt->board_name}}</td>
                    <td>{{$cmt->user->name}}</td>
                    <td class="truncate">
                        <a href={{route($cmt->board_name.'.show', $cmt->board_id)}}>{{$cmt->story}}</a>
                    </td>
                    <td>{{(new \Carbon\Carbon($cmt->created_at))->format('y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
        <div class="mt-8">{{$cmts->links()}}</div>
    </div>
@stop
