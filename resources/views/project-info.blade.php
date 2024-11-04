@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-4 mb-4">
        <img src="{{asset($project->photo)}}" class="card-img-top" alt="...">
        <div class="card-body text-dark">

            <h5 class="card-title">{{$project->name}}</h5>
            <hr/>
            <p class="card-text">{{$project->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Участников в команде: {{$participantsCount[$project->id]->count ?? 0}}/{{$project->participants}}</li>
            <li class="list-group-item">Формат: {{$project->format ? $project->format->name : 'Не указан'}}</li>
            <li class="list-group-item">Теги:</li>
            <li class="list-group-item" style="height: 60px;">
                @foreach($project->tags as $tag)
                    <span class="badge">{{$tag->name}}</span>
                @endforeach</li>
            <li class="list-group-item">Возрастное ограничение: {{$project->age_limit ? $project->age_limit->limit: 'Не указан'}}</li>
        </ul>


        <div class="card-footer" >
            <div class="d-grid gap-2 d-md-flex"  aria-label="First group">
                <a href="/" class="btn btn-primary">Участвовать</a>
            </div>
        </div>
    </div>
</div>
@endsection
