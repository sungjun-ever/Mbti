@extends('layouts.app')

@section('container')
    <div class="w-11/12 pt-6 mx-auto">
        <div>
            <form action="{{route('mbtis.infj.store')}}" method="post">
                @csrf
                <input type="hidden" name="mid" value="infj">
                <label for="title"></label>
                <input id="title" type="text" name="title"
                       class="w-full py-3 pl-2 text-lg rounded-md outline-none border-2 focus:border-blue-300"
                       placeholder="제목을 입력해주세요.">
                <label for="story"></label>
                <textarea id="story" name="story"
                          class="px-2 pt-2 border-2 focus:border-blue-300 rounded-md outline-none w-full resize-none text-lg"
                           rows="24" placeholder="내용을 입력해주세요."></textarea>
                <div class="mt-4 text-center">
                    <button type="submit" class="px-4 py-2 mr-4 text-lg rounded-lg text-gray-50 bg-blue-400 hover:bg-blue-800">작성</button>
                    <button class="px-4 py-2 text-lg rounded-lg text-gray-50 bg-red-400 hover:bg-red-800">취소</button>
                </div>
            </form>
        </div>
    </div>
@stop
