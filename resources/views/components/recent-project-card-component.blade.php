<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($recentProjects as $recentProject)
        <div class="col">
            <div class="card">
                <img src="{{$recentProject->photo}}" class="card-img-top" alt="...">
                <div class="card-body text-dark">

                    <h5 class="card-title">{{$recentProject->name}}</h5>
                    <hr/>
                    <p class="card-text">{{$recentProject->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Участников в команде: {{$participantsCount[$recentProject->id]->count ?? 0}}/{{$recentProject->participants}}</li>
                    <li class="list-group-item">Формат: {{$recentProject->format->name}}</li>
                    <li class="list-group-item">Теги:</li>
                    <li class="list-group-item" style="height: 60px;">
                        @foreach($recentProject->tags as $tag)
                            <span class="badge">{{$tag->name}}</span>
                        @endforeach
                    </li>
                    <li class="list-group-item">Возрастное ограничение: {{$recentProject->age_limit->limit}}</li>
                </ul>


                <div class="card-footer" >
                    <div class="d-grid gap-2 d-md-flex justify-content-between"  aria-label="First group">
                        <a href="{{route('project.show', [$recentProject->id])}}" class="btn btn-primary">Посмотреть</a>
                        <a href="/" class="btn btn-primary">Участвовать</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
