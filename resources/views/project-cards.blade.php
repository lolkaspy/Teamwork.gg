@extends('layouts.app')

@section('form')
    <div class="bg-white  sticky-top search-panel">
        <div class="container">
            <form class="form d-flex sticky-top bg-white">
                <input name="searchProject" class="form-control me-2" type="search" placeholder="Введите название проекта"
                       aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
        </div>
    </div>
@endsection
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')
        <x-project-card :projects="$projects"/>
@endsection
