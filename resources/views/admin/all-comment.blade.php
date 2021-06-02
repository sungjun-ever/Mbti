@extends('layouts.master')

@section('container')
    <div class="pt-6">
        <div class="flex pb-6 pl-2 items-center space-x-4">
            <div class="text-lg">댓글</div>
            <form action="{{route('admin.user.search')}}" method="get" class="inline-block">
                @csrf
                <select name="content" class="border-2 border-green-my focus:outline-none">
                    <option value="name">이름</option>
                    <option value="story">내용</option>
                </select>
                <input type="search" name="search" class="border-2 border-green-my focus:outline-none rounded-md pl-1">
                <button><i class="xi-search text-lg hover:text-green-800"></i></button>
            </form>
        </div>
    </div>
@stop
