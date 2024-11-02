<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($projects as $project)

            <div class="col">
                <div class="card">
                    <img src="static/images/project_placeholder.jpg" class="card-img-top" alt="...">
                    <div class="card-body">

                        <div>
                            <h5 class="card-title">{{$project->name}}</h5>
                            <p class="card-text card-description">{{$project->description}}</p>
                        </div>


                        <p class="card-text">Участников в команде: {{rand(1, 6)}}/7</p>
                        <p class="card-text">Формат: {{$project->format->name}}</p>
                        <span class="card-text">Теги:</span>
                        <div class="mb-5" style="height: 35px;">
                            @foreach($project->tags as $tag)
                                <span class="badge">{{$tag->name}}</span>
                            @endforeach
                        </div>

                        <p class="card-text ms-2">Возрастное ограничение: {{$project->age_limit->limit}}</p>

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
<hr>
{{$projects->withQueryString()->links()}}
