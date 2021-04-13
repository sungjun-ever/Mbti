@extends('layouts.app')

@section('container')
    <div class="pt-16">
        <div class="w-10/12 mx-auto border-b-2 border-blue-300">
            <p class="truncate text-lg pb-1">
                {{$sug->title}}
            </p>
        </div>
        <div class="w-10/12 mx-auto mt-4 min-h-50">
            <p class="text-lg">
                {{$sug->story}}
            </p>
        </div>
        @auth()
            @if($sug->user_id == auth()->user()->id)
                <div class="w-10/12 mx-auto mt-4 text-lg ">
                    <span class="hover:text-blue-300"><a href="{{route('suggests.edit', $sug->id)}}"><i class="xi-pen-o pr-2"></i><button>수정</button></a></span>
                    <form action="{{route('suggests.destroy', $sug->id)}}" method="post" class="inline-block">
                        @csrf
                        @method('delete')
                        <span class="hover:text-red-300"><i class="xi-cut pr-2 pl-4"></i>
                            <button type="submit">삭제</button>
                        </span>
                    </form>
                </div>
            @endif
        @endauth
    </div>
@stop
