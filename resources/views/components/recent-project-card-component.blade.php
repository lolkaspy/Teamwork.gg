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

                    <p class="card-text">Участников в команде: {{rand(1, 6)}}/7</p>
                    <p class="card-text">Формат: {{$recentProject->format->name}}</p>
                    <span class="card-text">Теги:</span>
                    <div class="mb-5" style="height: 35px;">
                        @foreach($recentProject->tags as $tag)
                            <span class="badge">{{$tag->name}}</span>
                        @endforeach
                    </div>
                    <p class="card-text ms-2">Возрастное ограничение: {{$recentProject->age_limit->limit}}</p>
                </div>
                <div class="text-end card-footer">
                    <a href="/">
                        <button class="btn btn-primary">Участвовать</button>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
