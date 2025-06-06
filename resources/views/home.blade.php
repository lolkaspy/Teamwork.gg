@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header home-header">{{ __('Авторизация') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Вы авторизованы!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div></div>
@endsection
