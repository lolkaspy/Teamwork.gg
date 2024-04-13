@extends('layout')

@section('form')
    <div class="container">

    <form class="form d-flex sticky-top bg-white">
        <input class="form-control me-2" type="search" placeholder="Введите название проекта" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Найти</button>
    </form>
    </div>
@endsection
@section('content')
    <div class="container">
    <br>
        <x-card-component/>
    <br>
    <hr>
    </div>
@endsection
