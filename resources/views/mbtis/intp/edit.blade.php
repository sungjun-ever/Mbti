@extends('layouts.app')

@section('container')
    @include('recycles.edit', ['mbti'=>$mbti])
@stop
