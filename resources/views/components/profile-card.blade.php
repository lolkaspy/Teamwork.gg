<div>
    <div class="container">
        <hr>
        <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="{{Auth::user()->photo}}" alt="photo" class="rounded-circle p-1 panel" width="110">
                <div class="mt-3">
                    <h4>{{Auth::user()->fname}} {{Auth::user()->lname}}</h4>
                    <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                    <p class="text-muted font-size-sm">{{Auth::user()->residence}}</p>
                    <button class="btn btn-outline-primary">Message</button>
                </div>
            </div>
        </div>
        </div>
<hr>
        <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
        <div class="card">
            <div class="card-body">
                <h4>Tags</h4>
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
                <h4>General</h4>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Login</h6>
                        <span class="text-secondary">{{Auth::user()->login}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Phone</h6>
                        <span class="text-secondary">{{Auth::user()->phone}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Registered</h6>
                        <span class="text-secondary">{{date_format(Auth::user()->created_at, 'd.m.Y')}}</span>
                    </li>
                </ul>
            </div>
        </div>
        </div>

        <div class="col">
        <div class="card">
            <div class="card-body">
                <h4>Roles</h4>
                <hr>
                <ul class="list-group list-group-flush">
                    @unless(empty(Auth::user()->roles))
                        @foreach(Auth::user()->roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Role</h6>
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
                <h4>Socials</h4>
                <hr>
                <ul class="list-group list-group-flush">
                    @unless(empty(Auth::user()->networks))
                        @foreach(Auth::user()->networks as $network)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Network</h6>
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
