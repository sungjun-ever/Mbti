@extends('layouts.app')

@section('container')
    @include('recycles.edit', ['post'=>$free, 'imgArr'=>$imgArr])
@stop
