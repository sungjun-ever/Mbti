@extends('layouts.app')

@section('container')
    @include('recycles.mbti-show', ['post' => $mbti])
    @include('recycles.mbti-comment', ['post'=>$mbti, 'cmts'=>$cmts])
    @include('recycles.mbti-list', ['post'=>$mbti])
@stop
