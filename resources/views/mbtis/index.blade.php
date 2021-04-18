@extends('layouts.app')

@section('container')
    <div class="flex grid xl:grid-cols-2 grid-cols-1 gap-x-8 justify-center pl-4 pt-12 ">
        <div class="mt-3">
            <a href="{{route('mbtis.enfj.index')}}" class="text-2xl inline-block">
                <button type="submit" class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ENFJ</button>
            </a>
            <div class="mt-3">
            @foreach($enfjs as $enfj)
                <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                    <a href="{{route('mbtis.enfj.show', $enfj->id)}}"><button>{{$enfj->title}}</button></a>
                </div>
            @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.enfp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ENFP</button>
            </a>
            <div class="mt-3">
                @foreach($enfps as $enfp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.enfp.show', $enfp->id)}}"><button>{{$enfp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.entj.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ENTJ</button>
            </a>
            <div class="mt-3">
                @foreach($entjs as $entj)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.entj.show', $entj->id)}}"><button>{{$entj->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.entp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ENTP</button>
            </a>
            <div class="mt-3">
                @foreach($entps as $entp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.entp.show', $entp->id)}}"><button>{{$entp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.esfj.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ESFJ</button>
            </a>
            <div class="mt-3">
                @foreach($esfjs as $esfj)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.esfj.show', $esfj->id)}}"><button>{{$esfj->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.esfp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ESFP</button>
            </a>
            <div class="mt-3">
                @foreach($esfps as $esfp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.esfp.show', $esfp->id)}}"><button>{{$esfp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.estj.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ESTJ</button>
            </a>
            <div class="mt-3">
                @foreach($estjs as $estj)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.estj.show', $estj->id)}}"><button>{{$estj->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.estp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ESTP</button>
            </a>
            <div class="mt-3">
                @foreach($estps as $estp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.estp.show', $estp->id)}}"><button>{{$estp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.infj.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">INFJ</button>
            </a>
            <div class="mt-3">
                @foreach($infjs as $infj)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.infj.show', $infj->id)}}"><button>{{$infj->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.infp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">INFP</button>
            </a>
            <div class="mt-3">
                @foreach($infps as $infp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.infp.show', $infp->id)}}"><button>{{$infp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.intj.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">INTJ</button>
            </a>
            <div class="mt-3">
                @foreach($intjs as $intj)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.intj.show', $intj->id)}}"><button>{{$intj->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.intp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">INTP</button>
            </a>
            <div class="mt-3">
                @foreach($intps as $intp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.intp.show', $intp->id)}}"><button>{{$intp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.isfj.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ISFJ</button>
            </a>
            <div class="mt-3">
                @foreach($isfjs as $isfj)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.isfj.show', $isfj->id)}}"><button>{{$isfj->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.isfp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ISFP</button>
            </a>
            <div class="mt-3">
                @foreach($isfps as $isfp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.isfp.show', $isfp->id)}}"><button>{{$isfp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.istj.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ISTJ</button>
            </a>
            <div class="mt-3">
                @foreach($istjs as $istj)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.istj.show', $istj->id)}}"><button>{{$istj->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <a href="{{route('mbtis.istp.index')}}" class="text-2xl">
                <button class="hover:text-blue-400 px-1 border-b-2 border-blue-400">ISTP</button>
            </a>
            <div class="mt-3">
                @foreach($istps as $istp)
                    <div class="text-lg w-9/12 border-b border-gray-200 pb-1 pl-1">
                        <a href="{{route('mbtis.istp.show', $istp->id)}}"><button>{{$istp->title}}</button></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
