@extends('layouts.app')

@section('container')
    @include('recycles.edit', ['post'=>$sug])
@stop
