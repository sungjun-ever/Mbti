@extends('layouts.app')

@section('container')
    @include('recycles.content', ['post'=>$free])
    @include('recycles.comment', ['post'=>$free, 'cmts'=>$cmts])
    @include('recycles.list', ['post'=>$free, 'posts'=>$frees])
@stop
