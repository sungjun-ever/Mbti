@extends('layouts.app')

@section('container')
    @include('recycles.index', ['mbtiName'=>$mbtiName, 'mbtis'=>$mbtis])
@stop

