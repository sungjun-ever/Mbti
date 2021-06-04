@extends('layouts.app')

@section('container')
    <div class="w-11/12 pt-12 mx-auto">
        <div class="pt-8">
        <span class="xl:text-2xl text-xl border-b-2 border-black">
            임시게시판
        </span>
        </div>
        <div class="mt-16 min-h-30">
            <table class="w-full table-fixed">
                <tr>
                    <td class="w-7/12"></td>
                    <td class="md:w-1/12"></td>
                    <td class="w-1/12 xl:table-cell hidden"></td>
                </tr>
                @foreach($temps as $temp)
                    <tr class="border-b">
                        <td class="pl-2 py-1 text-base truncate">
                            <a href="{{route('temp.show', $temp->id)}}"
                               class="hover:no-underline hover:text-green-800" >{{$temp->title}}</a>
                        </td>
                        <td class="text-center xl:text-base text-xs truncate">{{$temp->user->name}}</td>
                        <td class="w-1/12 xl:table-cell hidden">{{$temp->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-16">
            {{$temps->links()}}
        </div>
    </div>

@stop
