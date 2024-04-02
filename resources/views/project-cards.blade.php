@extends('layout')
@section('content')
    <br>
    <form class="form d-flex">
        <input class="form-control me-2" type="search" placeholder="Введите название проекта" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Найти</button>
    </form>
    <br>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @php

        @endphp
        @for($i=0; $i < 48; $i++)
            @if(rand(1, 7)<>7)
                <div class="col">
                    <div class="card">
                        <img src="static/images/project_placeholder.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Название проекта</h5>
                            <p class="card-text">Небольшое описание о проекте</p>
                            <p class="card-text">Участников в команде: {{rand(1, 6)}}/7</p>
                            Теги:
                            <div>
                                <h5><span class="badge text-bg-secondary">Юмор</span>
                                    <span class="badge text-bg-secondary">Дота</span>
                                    <span class="badge text-bg-secondary">Политика</span>
                                    <span class="badge text-bg-secondary">Музыка</span>
                                    <span class="badge text-bg-secondary">IT</span>
                                    <span class="badge text-bg-secondary">Бекэнд</span>
                                    <span class="badge text-bg-secondary">Фронтэнд</span>
                                    <span class="badge text-bg-secondary">Маркетинг</span>
                                    <span class="badge text-bg-secondary">Философия</span>
                                    <span class="badge text-bg-secondary">Финансы</span></h5>
                            </div>
                            <div class="text-end">
                                <a href="/">
                                    <button class="btn btn-primary">Участвовать</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
    </div>
    <br>
    <hr>
@endsection
