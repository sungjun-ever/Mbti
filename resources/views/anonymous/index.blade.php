@extends('layouts.app')

@section('container')
    @include('recycles.index', ['posts'=>$posts, 'boardName'=>$boardName])
@stop
