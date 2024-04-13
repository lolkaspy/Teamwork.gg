<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($projects as $project)
        @if(rand(1, 7)<>7)
            <div class="col">
                <div class="card">
                    <img src="static/images/project_placeholder.jpg" class="card-img-top" alt="...">
                    <div class="card-body">

                        <div>
                            <h5 class="card-title">{{$project->name}}</h5>
                            <p class="card-text">{{$project->description}}</p>
                            <p class="card-text">Участников в команде: {{rand(1, 6)}}/7</p>
                        </div>

                        <span>Теги:</span>
                        <div>

                            @foreach($tags as $tag)
                                <span class="badge">{{$tag->name}}</span>
                            @endforeach
                            <h5></h5>
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
    @endforeach
</div>
