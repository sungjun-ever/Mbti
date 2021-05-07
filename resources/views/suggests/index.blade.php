@extends('layouts.app')

@section('container')
    @include('recycles.index', ['boardName' => $boardName, 'posts' => $sugs])
@stop

