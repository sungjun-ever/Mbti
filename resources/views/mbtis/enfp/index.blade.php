@extends('layouts.app')

@section('container')

    @include('recycles.index', ['boardName'=>$mbtiName, 'posts'=>$mbtis])

@stop

