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


                        @include('components.tag-component')

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
