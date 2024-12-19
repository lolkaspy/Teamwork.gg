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
        </ul>

        <div class="tab-content admin-div">
            <div class="tab-pane fade show active" id="users">
                <!-- Таблица пользователей -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->fname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Редактировать</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->withQueryString()->links()}}
            </div>
            <div class="tab-pane fade" id="projects">
                <!-- Таблица проектов -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название проекта</th>
                        <th>Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Редактировать</a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$projects->withQueryString()->links()}}
            </div>

    </div>
    </div>

@endsection
