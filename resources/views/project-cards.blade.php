@extends('layouts.app')

@section('form')
    <div class="bg-white  sticky-top search-panel">
        <div class="container">
            <form class="form d-flex sticky-top bg-white">
                <input class="form-control me-2" type="search" placeholder="Введите название проекта"
                       aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
        </div>
    </div>

@endsection
@section('content')

    <div class="container">
        <hr>
        <x-card-component :projects="$projects"/>
        <br>
    </div>

@endsection
