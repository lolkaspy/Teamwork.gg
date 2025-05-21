@extends('layouts.app')

@section('content')
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


    <div class="container">
        <ul class="nav nav-tabs admin-ul" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" data-bs-toggle="tab" href="#users">Пользователи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" data-bs-toggle="tab" href="#projects">Проекты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" data-bs-toggle="tab" href="#roles">Роли</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" data-bs-toggle="tab" href="#news">Новости</a>
            </li>
        </ul>

        <div class="tab-content admin-div">
            <x-admin.user-table/>
            <x-admin.project-table/>
            <x-admin.role-table/>
            <x-admin.news-table/>
        </div>

    </div>

@endsection
