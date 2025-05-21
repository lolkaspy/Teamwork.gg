@extends('layouts.app')

@section('form')
    <div class="bg-white sticky-top search-panel">
        <div class="container">
            <form method="GET" action="{{ route('projects.index') }}" class="form sticky-top bg-white">
                <!-- Поле поиска по названию (на всю ширину) -->
                <div class="row mb-3">
                    <div class="col-12">
                        <input name="search" class="form-control" type="search"
                               placeholder="Введите название проекта" aria-label="Search"
                               value="{{ request('search') }}">
                    </div>
                </div>

                <!-- Фильтры (в одной строке) -->
                <div class="row g-3 align-items-center">
                    <!-- Фильтр по тегам -->
                    <div class="col-md">
                        <input name="tags" id="searchTags" class="form-control tagify-outside"
                               placeholder="Выберите теги">
                    </div>

                    <!-- Фильтр по формату -->
                    <div class="col-md-auto">
                        <select name="format_id" class="form-select">
                            <option value="">Все форматы</option>
                            <option value="{{$formatEnum::Remote->value}}" {{ request('format_id') == $formatEnum::Remote->value ? 'selected' : '' }}>Дистанционный</option>
                            <option value="{{$formatEnum::OnSite->value}}" {{ request('format_id') == $formatEnum::OnSite->value ? 'selected' : '' }}>Очный</option>
                            <option value="{{$formatEnum::Mixed->value}}" {{ request('format_id') == $formatEnum::Mixed->value ? 'selected' : '' }}>Смешанный</option>
                        </select>
                    </div>

                    <!-- Фильтр по возрастному ограничению -->
                    <div class="col-md-auto">
                        <select name="age_limit_id" class="form-select">
                            <option value="">Все возрасты</option>
                            <option value="{{$ageLimitEnum::Sixteen->value}}" {{ request('age_limit_id') == $ageLimitEnum::Sixteen->value ? 'selected' : '' }}>16+</option>
                            <option value="{{$ageLimitEnum::Eighteen->value}}" {{ request('age_limit_id') == $ageLimitEnum::Eighteen->value ? 'selected' : '' }}>18+</option>
                            <option value="{{$ageLimitEnum::ThirtyFive->value}}" {{ request('age_limit_id') == $ageLimitEnum::ThirtyFive->value ? 'selected' : '' }}>35+</option>
                        </select>
                    </div>

                    <!-- Кнопка "Найти" -->
                    <div class="col-md-auto">
                        <button class="btn btn-outline-success w-100" type="submit">Найти</button>
                    </div>
                </div>

                <!-- Кнопка "Сбросить фильтры" (посередине) -->
                @if(request()->anyFilled(['search', 'tags', 'format_id', 'age_limit_id']))
                    <div class="row mt-3">
                        <div class="col-md-auto mx-auto"> <!-- mx-auto для центрирования -->
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary" style="width: 200px;">
                                Сбросить фильтры
                            </a>
                        </div>
                    </div>
                @endif
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
