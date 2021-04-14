@extends('layouts.app')

@section('container')
    @include('recycles.mbti-create', ['mbtiName'=>$mbtiName])
@stop
