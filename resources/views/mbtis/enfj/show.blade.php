@extends('layouts.app')

@section('container')
    @include('recycles.mbti-show', ['mbti' => $mbti])
    @include('recycles.mbti-comment', ['mbtiName'=>$mbtiName, 'mbti'=>$mbti, 'cmts'=>$cmts])
@stop
