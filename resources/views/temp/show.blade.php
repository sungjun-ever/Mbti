@extends('layouts.app')

@section('container')
    @include('recycles.content', ['post'=>$temp])
@stop
