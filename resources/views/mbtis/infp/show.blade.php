@extends('layouts.app')

@section('container')
    @include('recycles.content', ['post' => $mbti])
    @include('recycles.comment', ['post'=>$mbti, 'cmts'=>$cmts])
    @include('recycles.list', ['post'=>$mbti, 'posts'=>$mbtis])
@stop
