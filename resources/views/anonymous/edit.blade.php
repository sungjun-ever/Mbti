@extends('layouts.app')

@section('container')
    @include('recycles.edit', ['post'=>$post])
@stop
