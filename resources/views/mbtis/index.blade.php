@extends('layouts.app')

@section('container')
    <div class="flex grid xl:grid-cols-2 grid-cols-1 gap-x-8 justify-center pl-4 pt-12 ">
        @include('recycles.mbti-main-index', ['mbtis' => $enfjs, 'mbtiName' => $mbtiName[0]])
        @include('recycles.mbti-main-index', ['mbtis' => $enfps, 'mbtiName' => $mbtiName[1]])
        @include('recycles.mbti-main-index', ['mbtis' => $entjs, 'mbtiName' => $mbtiName[2]])
        @include('recycles.mbti-main-index', ['mbtis' => $entps, 'mbtiName' => $mbtiName[3]])
        @include('recycles.mbti-main-index', ['mbtis' => $estjs, 'mbtiName' => $mbtiName[4]])
        @include('recycles.mbti-main-index', ['mbtis' => $estps, 'mbtiName' => $mbtiName[5]])
        @include('recycles.mbti-main-index', ['mbtis' => $esfjs, 'mbtiName' => $mbtiName[6]])
        @include('recycles.mbti-main-index', ['mbtis' => $esfps, 'mbtiName' => $mbtiName[7]])
        @include('recycles.mbti-main-index', ['mbtis' => $infjs, 'mbtiName' => $mbtiName[8]])
        @include('recycles.mbti-main-index', ['mbtis' => $infps, 'mbtiName' => $mbtiName[9]])
        @include('recycles.mbti-main-index', ['mbtis' => $intjs, 'mbtiName' => $mbtiName[10]])
        @include('recycles.mbti-main-index', ['mbtis' => $intps, 'mbtiName' => $mbtiName[11]])
        @include('recycles.mbti-main-index', ['mbtis' => $isfjs, 'mbtiName' => $mbtiName[12]])
        @include('recycles.mbti-main-index', ['mbtis' => $isfps, 'mbtiName' => $mbtiName[13]])
        @include('recycles.mbti-main-index', ['mbtis' => $istjs, 'mbtiName' => $mbtiName[14]])
        @include('recycles.mbti-main-index', ['mbtis' => $istps, 'mbtiName' => $mbtiName[15]])

    </div>
@stop
