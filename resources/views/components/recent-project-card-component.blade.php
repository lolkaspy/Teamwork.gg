<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($recentProjects as $recentProject)

        <div class="col">
            <div class="card">
                <img src="{{$recentProject->photo}}" class="card-img-top" alt="...">
                <div class="card-body">

                    <div>
                        <h5 class="card-title">{{$recentProject->name}}</h5>
                        <p class="card-text card-description">{{$recentProject->description}}</p>
                    </div>

                    <p class="card-text">Участников в команде: {{$participantsCount[$recentProject->id]->count ?? 0}}/{{$recentProject->participants}}</p>
                    <p class="card-text">Формат: {{$recentProject->format->name}}</p>
                    <span class="card-text">Теги:</span>
                    <div class="mb-5" style="height: 35px;">
                        @foreach($recentProject->tags as $tag)
                            <span class="badge">{{$tag->name}}</span>
                        @endforeach
                    </div>
                    <p class="card-text ms-2">Возрастное ограничение: {{$recentProject->age_limit->limit}}</p>
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
