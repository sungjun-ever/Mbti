@extends('layouts.app')

@section('container')
    <div class="w-11/12 pt-12 mx-auto">
        <div class="text-right pt-8">
            <a href="{{route('suggests.create')}}"><i class="xi-pen pr-1"></i><button>글쓰기</button></a>
        </div>
        <div class="mt-16 min-h-30">
            <table class="w-full table-fixed">
                <tr>
                    <td class="w-7/12"></td>
                    <td class="w-1/12"></td>
                    <td class="w-1/12"></td>
                </tr>
                @foreach($sugs as $sug)
                    <tr class="border-b">
                        <td class="text-lg truncate pl-2"><a href="{{route('suggests.show', $sug->id)}}" class="text-sm">{{$sug->title}}</a></td>
                        <td class="text-center text-sm">{{$sug->user_name}}</td>
                        <td class="text-sm ">{{$sug->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-16">
            {{$sugs->links()}}
        </div>
    </div>
@stop

