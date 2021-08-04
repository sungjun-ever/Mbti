@extends('layouts.app')

@section('container')
    {{-- 존재하지 않는 게시물 화면 --}}
    <div class="container pt-16">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('메세지') }}</div>
                    <div class="card-body">
                        존재하지 않는 게시물입니다.
                        <div class="mt-4 text-right">
                            <button class="bg-green-my hover:bg-green-800 rounded-md text-gray-50 px-3 py-1" onclick="history.back()">닫기</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
