@extends('layouts.app')

@section('container')
    @include('recycles.content', ['post'=>$post])
    @include('recycles.comment', ['post'=>$post, 'cmts'=>$cmts])
    @include('recycles.list', ['post'=>$post, 'posts'=>$posts])
@stop
