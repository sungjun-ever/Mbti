@extends('layouts.app')

@section('container')
    <div class="w-11/12 pt-12 mx-auto">
        <div class="pt-8">
            <span class="xl:text-2xl text-xl border-b-2 border-blue-300">건의게시판</span>
        </div>
        <div class="text-right pt-8">
            <a href="{{route($boardName.'.create')}}">
                <i class="xi-pen pr-1"></i><button class="">글쓰기</button>
            </a>
        </div>
        <div class="mt-16 min-h-30">
            <table class="w-full table-fixed">
                <tr>
                    <td class="w-7/12"></td>
                    <td class="w-1/12"></td>
                    <td class="w-1/12 xl:table-cell hidden"></td>
                </tr>
                @foreach($sugs as $sug)
                    <tr class="border-b">
                        <td class="pl-2 truncate py-1 text-base">
                            @if($sug->secret === 1)
                                <a href="{{route($sug->board_name.'.show', $sug->id)}}"
                                   class="hover:no-underline">
                                    <i class="xi-lock"></i><span class="text-gray-400 pl-1">비밀글입니다.</span>
                                </a>
                            @else
                                <a href="{{route($sug->board_name.'.show', $sug->id)}}" class="hover:no-underline">
                                    {{$sug->title}}
                                </a>
                            @endif
                        </td>
                        <td class="text-center xl:text-base text-xs">{{$sug->user->name}}</td>
                        <td class="w-1/12 xl:table-cell hidden">{{$sug->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-16">
            {{$sugs->links()}}
        </div>
    </div>

@stop
