@extends('layouts.app')


@section('container')
    <div class="grid grid-cols-1">
        <div class="pt-8 w-2/3">
            <a href="{{route('mbtis.index')}}" class="text-2xl inline-block pl-8">
                <button type="submit" class="hover:text-blue-400 px-1 border-b-2 border-blue-400">MBTI</button>
            </a>
            <div class="mt-3 pl-4">
                @foreach($mbtis as $mbti)
                    <div class="text-base w-9/12 border-b border-gray-200 pb-1">
                        <a href="{{route('mbtis.'.$mbti->mbtiSort.'.show', $mbti->id)}}"><button>{{$mbti->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pt-8 w-2/3">
            <a href="{{route('frees.index')}}" class="text-2xl inline-block pl-8">
                <button type="submit" class="hover:text-blue-400 px-1 border-b-2 border-blue-400">자유게시판</button>
            </a>
            <div class="mt-3 pl-4">
                @foreach($frees as $free)
                    <div class="text-base w-9/12 border-b border-gray-200 pb-1">
                        <a href="{{route('frees.show', $free->id)}}"><button>{{$free->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pt-8 w-2/3">
            <a href="{{route('suggests.index')}}" class="text-2xl inline-block pl-8">
                <button type="submit" class="hover:text-blue-400 px-1 border-b-2 border-blue-400">건의게시판</button>
            </a>
            <div class="mt-3 pl-4">
                @foreach($sugs as $sug)
                    <div class="text-base w-9/12 border-b border-gray-200 pb-1">
                        <a href="{{route('suggests.show', $sug->id)}}"><button>{{$sug->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
