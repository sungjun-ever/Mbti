@extends('layouts.master')

@section('container')
    <div class="pt-6">
        <div class="flex pb-6 pl-2 items-center space-x-4">
            <div class="text-lg">사용자 정보</div>
            {{--  검색창 --}}
            <form action="{{route('admin.user.search')}}" method="get" class="inline-block">
                @csrf
                <select name="content" class="border-2 border-green-my focus:outline-none">
                    <option value="name">이름</option>
                    <option value="email">이메일</option>
                </select>
                <input type="search" name="search" class="border-2 border-green-my focus:outline-none rounded-md pl-1">
                <button><i class="xi-search text-lg hover:text-green-800"></i></button>
            </form>
        </div>
        {{--  목록 --}}
        <table class="w-full">
            <tr class="border-b-2 border-t-2 text-center">
                <td class="w-2/12">이름</td>
                <td class="w-3/12">이메일</td>
                <td class="w-2/12">가입날짜</td>
                <td class="w-2/12">작성 글</td>
                <td class="w-2/12">차단</td>
                <td class="w-1/12">해제</td>
            </tr>
            @foreach($users as $user)
                <tr class="text-center h-10 border-b">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('y-m-d')}}</td>
                    <td class=text-base">
                        <a href="{{route('admin.user.post', $user->id)}}"><button type="submit"><i class="xi-bars"></i></button></a>
                        <a href="#"><i class="xi-comment"></i></a>
                    </td>
                    <td>
                        <form action="{{route('admin.user.block')}}" method="post" class="inline-block">
                            @csrf
                            <input type="hidden" name="email" value="{{$user->email}}">
                            <select name="days" class="border-2 border-green-my w-16">
                                <option value=7>7일</option>
                                <option value=30>30일</option>
                                <option value=90>90일</option>
                                <option value=180>180일</option>
                                <option value=365>365일</option>
                                <option value="ever">영구</option>
                            </select>
                            <button type="submit" class="text-red-500 hover:text-red-800 pl-2">차단</button>
                        </form>
                    </td>
                    <td>
                        @if($user->banned_at > \Carbon\Carbon::now())
                            <form action="{{route('admin.user.release')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="email" value="{{$user->email}}">
                                <button type="submit" onclick="if(!confirm('해제하시겠습니까?')) return false">
                                    <i class="xi-check text-green-400 hover:text-red-500 text-xl"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="mt-8">{{$users->links()}}</div>
    </div>
@stop
