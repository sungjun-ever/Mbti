@extends('layouts.app')

@section('container')
    @include('recycles.mbti-show', ['post' => $mbti])
    @include('recycles.mbti-comment', ['mbti'=>$mbti, 'cmts'=>$cmts])
    @include('recycles.mbti-list', ['mbti'=>$mbti])
@stop
