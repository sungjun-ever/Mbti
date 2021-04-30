@extends('layouts.app')

@section('container')
    @include('recycles.create', ['boardName'=>$mbtiName])
@stop
