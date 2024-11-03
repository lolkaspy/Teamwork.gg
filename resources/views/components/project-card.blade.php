<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($projects as $project)

            <div class="col">
                <div class="card">
                    <img src="{{$project->photo}}" class="card-img-top" alt="...">
                    <div class="card-body">

                        <div>
                            <h5 class="card-title">{{$project->name}}</h5>
                            <p class="card-text card-description">{{$project->description}}</p>
                        </div>


                        <p class="card-text">Участников в команде: {{$participantsCount[$project->id]->count ?? 0}}/{{$project->participants}}</p>
                        <p class="card-text">Формат: {{$project->format->name}}</p>
                        <span class="card-text">Теги:</span>
                        <div class="mb-5" style="height: 35px;">
                            @foreach($project->tags as $tag)
                                <span class="badge">{{$tag->name}}</span>
                            @endforeach
                        </div>

                        <p class="card-text ms-2">Возрастное ограничение: {{$project->age_limit->limit}}</p>

                    </div>

                    <div class="card-footer" >
                        <div class="d-grid gap-2 d-md-flex justify-content-between"  aria-label="First group">
                            <a href="/" class="btn btn-primary">Посмотреть</a>
                            <a href="/" class="btn btn-primary">Участвовать</a>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach
</div>
<hr>
{{$projects->withQueryString()->links()}}
