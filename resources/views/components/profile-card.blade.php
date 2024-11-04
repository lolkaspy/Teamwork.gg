<div>
    <div class="container">
        <hr>
        <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="{{Auth::user()->photo}}" alt="photo" class="rounded-circle p-1 panel" width="110">
                <div class="mt-3">
                    <h4 class="profile-header">{{Auth::user()->fname}} {{Auth::user()->lname}}</h4>
                    <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                    <p class="text-muted font-size-sm">{{Auth::user()->residence}}</p>
                </div>
            </div>
        </div>
        </div>

        <hr>
        <div class="row row-cols-1 row-cols-md-2 g-4">

        <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="profile-header">Проекты</h4>
                <hr>
                <div class="card-group">
                    @foreach(Auth::user()->projects as $project)
                        <div class="card">
                            <img src="{{$project->photo}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$project->name}}</h5>
                            </div>
                            <ul class="list-group list-group-flush align-items-center">
                                <li class="list-group-item"> <a href="/" class="btn btn-primary">Посмотреть</a></li>
                                <li class="list-group-item"> <a href="/" class="btn btn-primary">Участвовать</a></li>
                            </ul>



                        </div>

                    @endforeach
                </div>
            </div>
        </div>
        </div>

        <div class="col">

        <div class="card mb-4">
            <div class="card-body">
                <h4 class="profile-header">Общая информация</h4>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Логин</h6>
                        <span class="text-secondary">{{Auth::user()->login}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Номер телефона</h6>
                        <span class="text-secondary">{{Auth::user()->phone}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Зарегистрирован</h6>
                        <span class="text-secondary">{{date_format(Auth::user()->created_at, 'd.m.Y')}}</span>
                    </li>
                </ul>
            </div>
        </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="profile-header">Теги</h4>
                    <hr>
                    <div>
                        @foreach(Auth::user()->tags as $tag)
                            <span class="badge">{{$tag->name}}</span>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
        <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="profile-header">Роли</h4>
                <hr>
                <ul class="list-group list-group-flush">
                    @unless(empty(Auth::user()->roles))
                        @foreach(Auth::user()->roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Роль</h6>
                                <span class="text-secondary">{{$role->name}}</span>
                            </li>
                        @endforeach
                    @endunless
                </ul>
            </div>
        </div>
        </div>

        <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="profile-header">Социальные сети</h4>
                <hr>
                <ul class="list-group list-group-flush">
                    @unless(empty(Auth::user()->networks))
                        @foreach(Auth::user()->networks as $network)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Социальная сеть</h6>
                                <span class="text-secondary">{{$network->name}}</span>
                            </li>
                        @endforeach
                    @endunless
                </ul>
            </div>
        </div>
        </div>
        </div>


        <hr>
    </div>

</div>
