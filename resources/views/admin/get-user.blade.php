@extends('layouts.master')

@section('container')
    <div class="pt-6">
        <div class="flex pb-6 pl-2 items-center space-x-4">
            <div class="text-lg">사용자 정보</div>
            <form action="#" method="post" class="inline-block">
                <select name="content" class="border-2 border-green-my focus:outline-none">
                    <option value="name">이름</option>
                    <option value="email">이메일</option>
                </select>
                <input type="search" class="border-2 border-green-my focus:outline-none rounded-md pl-1">
                <button><i class="xi-search text-lg hover:text-green-800"></i></button>
            </form>
        </div>
        <table class="w-full">
            <tr class="border-b-2 border-t-2 text-center">
                <td class="w-2/12">이름</td>
                <td class="w-3/12">이메일</td>
                <td class="w-2/12">가입날짜</td>
                <td class="w-2/12">작성 글</td>
                <td class="w-2/12">차단</td>
            </tr>
            @foreach($users as $user)
                <tr class="text-center h-10">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('Y-m-d')}}</td>
                    <td class=text-base">
                        <a href="#" class="pr-2"><i class="xi-bars"></i></a>
                        <a href="#"><i class="xi-comment"></i></a>
                    </td>
                    <td>
                        <form action="{{route('admin.user.block')}}" method="post" class="inline-block">
                            @csrf
                            <input type="hidden" name="email" value="{{$user->email}}">
                            <select name="days" class="border-2 border-green-my w-16">
                                <option value="seven">7일</option>
                                <option value="thirty">30일</option>
                                <option value="ninety">90일</option>
                                <option value="half">180일</option>
                                <option value="year">365일</option>
                                <option value="ever">영구</option>
                            </select>
                            <button type="submit" class="text-red-500 hover:text-red-800 pl-2">차단</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="mt-8">{{$users->links()}}</div>
    </div>
@stop
