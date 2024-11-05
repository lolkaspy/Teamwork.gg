<div class="container">

    <div class="d-flex justify-content-end mt-4 mb-2">
        {{$projects->withQueryString()->links()}}
    </div>

<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($projects as $project)
            <div class="col">
                <div class="card">
                    <img src="{{$project->photo}}" class="card-img-top" alt="...">
                    <div class="card-body text-dark">

                        <h5 class="card-title">{{$project->name}}</h5>
                        <hr/>
                        <p class="card-text">{{$project->description}}</p>
                    </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Участников в команде: {{$participantsCount[$project->id]->count ?? 0}}/{{$project->participants}}</li>
                            <li class="list-group-item">Формат: {{$project->format->name}}</li>
                            <li class="list-group-item">Теги:</li>
                            <li class="list-group-item" style="height: 60px;">
                                @foreach($project->tags as $tag)
                                    <span class="badge">{{$tag->name}}</span>
                                @endforeach</li>
                            <li class="list-group-item">Возрастное ограничение: {{$project->age_limit->limit}}</li>
                        </ul>


                    <div class="card-footer" >
                        <div class="d-grid gap-2 d-md-flex justify-content-between"  aria-label="First group">
                            <a href="{{route('projects.show', [$project->id])}}" class="btn btn-primary">Посмотреть</a>
                            <a href="/" class="btn btn-primary">Участвовать</a>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach
</div>

    <div class="d-flex justify-content-end mt-4 mb-2">
{{$projects->withQueryString()->links()}}
    </div>

</div>
