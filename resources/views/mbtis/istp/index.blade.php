@extends('layouts.app')

@section('container')
    @include('recycles.mbti-index', ['mbtiName'=>$mbtiName, 'mbtis'=>$mbtis])
@stop

