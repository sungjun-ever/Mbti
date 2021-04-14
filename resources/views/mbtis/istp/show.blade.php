@extends('layouts.app')

@section('container')
    @include('recycles.mbti-show', ['mbti' => $mbti])
@stop
