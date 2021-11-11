@extends('layouts.app')

@section('container')
    @include('recycles.search', ['search'=>$search, 'content'=>$content, 'posts'=>$posts])
@stop
