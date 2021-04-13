@extends('layouts.app')
<?php
    $mbtiUrl = explode('/', $_SERVER['REQUEST_URI']);
    $mbtiName = $mbtiUrl[2];
?>
@section('container')
    <div class="w-11/12 pt-12 mx-auto">
        <div class="text-right pt-8">
            <a href="{{route('mbtis.istp.create')}}">
                <i class="xi-pen pr-1"></i><button class="">글쓰기</button>
            </a>
        </div>
        <div class="mt-16 min-h-30">
            <table class="w-full table-fixed">
                <tr>
                    <td class="w-1/12"></td>
                    <td class="w-5/12"></td>
                    <td class="w-1/12"></td>
                    <td class="w-1/12"></td>
                </tr>
            @foreach($mbtis as $mbti)
                <tr class="border-b">
                    <td class="text-center">{{$mbti->id}}</td>
                    <td class="text-lg truncate"><a href="{{route('mbtis.istp.show', $mbti->id)}}">{{$mbti->title}}</a></td>
                    <td class="text-center">{{$mbti->user_name}}</td>
                    <td class="">{{$mbti->created_at->format('Y-m-d')}}</td>
                </tr>
            @endforeach
            </table>
        </div>
        <div>
            {{$mbtis->links()}}
        </div>
    </div>
@stop

