@extends('layouts.app')

@section('container')
    <div class="pt-16">
        <form class="xl:w-1/3 p-2 w-full m-auto border" action="{{route('confirm', auth()->user()->id)}}" method="post">
            @csrf
            <input type="hidden" name="mid" value="{{$_REQUEST['mid']}}">
            <label for="password" class="block text-base">비밀번호 확인</label>
            <input type="password" id="password" name="password"
                   class="border-2 border-blue-300 py-1 w-2/3">
            <button type="submit" class="bg-green-500 hover:bg-green-800 text-gray-50 px-2 py-1 rounded-lg">확인</button>
            @if (Session::has('fail'))
                <div><span class="text-sm text-red-600">{{Session::get('fail')}}</span></div>
            @endif
            <p class="text-sm text-red-600">@error('password') 비밀번호를 입력하세요. @enderror</p>
        </form>
    </div>
@stop
