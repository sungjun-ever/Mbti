@extends('layouts.app')

@section('container')
    @include('recycles.create', ['boardName'=>$boardName])
@stop
