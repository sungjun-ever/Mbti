@extends('layouts.app')


@section('container')
    <div class="grid xl:grid-cols-2 grid-cols-1">
        <div class="pt-8 w-2/3">
            <a href="{{route('mbtis.index')}}" class="lg:text-2xl text-lg inline-block pl-8">
                <button type="submit" class="hover:text-green-800 px-1 border-b-2 border-green-my">MBTI</button>
            </a>
            <div class="mt-3 pl-4">
                @foreach($mbtis as $mbti)
                    <div class="lg:text-base text-sm w-9/12 border-b border-gray-200 pb-1">
                        <a href="{{route($mbti->board_name.'.show', $mbti->id)}}" class="hover:text-green-my hover:no-underline">{{$mbti->title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pt-8 w-2/3">
            <a href="{{route('frees.index')}}" class="lg:text-2xl text-lg inline-block pl-8">
                <button type="submit" class="hover:text-green-800 px-1 border-b-2 border-green-my">자유게시판</button>
            </a>
            <div class="mt-3 pl-4">
                @foreach($frees as $free)
                    <div class="lg:text-base text-sm w-9/12 border-b border-gray-200 pb-1">
                        <a href="{{route('frees.show', $free->id)}}" class="hover:text-green-my hover:no-underline">{{$free->title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
