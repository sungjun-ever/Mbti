@extends('layouts.app')


@section('container')
    <div class="grid xl:grid-cols-2 grid-cols-1">
        {{--  MBTI 게시판  --}}
        <div class="pt-8 w-2/3 mb-4">
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
        {{--  자유게시판  --}}
        <div class="pt-8 w-2/3 mb-4">
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
        {{--  익명게시판  --}}
        <div class="pt-8 w-2/3 mb-4">
            <a href="{{route('frees.index')}}" class="lg:text-2xl text-lg inline-block pl-8">
                <button type="submit" class="hover:text-green-800 px-1 border-b-2 border-green-my">익명게시판</button>
            </a>
            <div class="mt-3 pl-4">
                @foreach($anonys as $anony)
                    <div class="lg:text-base text-sm w-9/12 border-b border-gray-200 pb-1">
                        <a href="{{route('frees.show', $anony->id)}}" class="hover:text-green-my hover:no-underline">{{$anony->title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
