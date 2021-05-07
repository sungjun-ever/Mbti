@extends('layouts.app')

@section('container')
    @include('recycles.content', ['post'=>$sug])
    @include('recycles.comment', ['post'=>$sug, 'cmts'=>$cmts])
@stop

