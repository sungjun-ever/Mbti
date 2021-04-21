@extends('layouts.app')

@section('container')
    <div class="w-11/12 pt-12 mx-auto">
        <div class="pt-8">
            <span class="xl:text-2xl text-xl border-b-2 border-blue-300">자유게시판</span>
        </div>
        <div class="text-right pt-8">
            <a href="{{route('frees.create')}}"><i class="xi-pen pr-1"></i><button>글쓰기</button></a>
        </div>
        <div class="mt-16 min-h-30">
            <table class="w-full table-fixed">
                <tr>
                    <td class="w-7/12"></td>
                    <td class="w-1/12"></td>
                    <td class="w-1/12 xl:table-cell hidden"></td>
                </tr>
                @foreach($frees as $free)
                    <tr class="border-b">
                        <td class="pl-2 truncate"><a href="{{route('frees.show', $free->id)}}" class="text-lg">{{$free->title}}</a></td>
                        <td class="text-center xl:text-base text-xs">{{$free->user_name}}</td>
                        <td class="w-1/12 xl:table-cell hidden">{{$free->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-16">
            {{$frees->links()}}
        </div>
    </div>
@stop

