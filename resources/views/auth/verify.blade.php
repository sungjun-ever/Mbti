@extends('layouts.app')

@section('container')
<div class="pt-16">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('이메일 인증을 완료해주세요.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('새 인증 링크를 이메일로 보냈습니다.') }}
                        </div>
                    @endif

                    {{ __('이메일을 확인하고 인증을 완료해주세요.') }}
                    {{ __('인증 이메일을 받지 못했다면') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('여기를 눌러 새 인증 링크를 받으세요.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
