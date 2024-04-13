@extends('layout')
@section('content')
    <br>
    <form class="form d-flex">
        <input class="form-control me-2" type="search" placeholder="Введите название проекта" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Найти</button>
    </form>
    <br>
    @include('components.card-component')
    <br>
    <hr>
@endsection
