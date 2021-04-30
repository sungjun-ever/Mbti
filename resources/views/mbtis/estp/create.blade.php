@extends('layouts.app')

@section('container')
    @include('recycles.create', ['mbtiName'=>$mbtiName])
@stop
