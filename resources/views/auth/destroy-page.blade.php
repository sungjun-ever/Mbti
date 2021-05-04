@extends('layouts.app')

@section('container')
    <div class="pt-16">
        <form action="{{route('destroy', auth()->user()->id)}}" method="post" class="w-1/2 mx-auto pt-24">
            @csrf
            @method('delete')
            <div class="pt-8 pb-4 px-1 shadow-md text-center">
                <span class="text-lg">계정을 삭제하시겠습니까?</span>
                <div class="mt-4">
                    <button type="submit" class="bg-red-500 hover:bg-red-800 px-3 py-1 mr-4 text-gray-50 rounded-lg" onclick="if(!confirm('삭제하시겠습니까?')) return false">삭제</button>
                    <a href="{{route('home')}}"><button type="button" class="bg-green-500 hover:bg-green-800 px-3 py-1 text-gray-50 rounded-lg">취소</button></a>
                </div>
            </div>
        </form>
    </div>
@stop
