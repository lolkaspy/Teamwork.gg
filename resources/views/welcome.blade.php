@extends('layouts.app')
@section('content')
    <div class="container-md landing-welcome-text" id="dynamic-bg">
    <h1 class="welcome-h1">Место, в которое <br>хочется  возвращаться <br><span class="landing-welcome-placeholder"  id="dynamic-text">всегда!</span></h1>
    </div>
    <div class="container-md recent-projects">
        <div class="welcome-header"><h2 class="recent-header">Недавние проекты</h2> </div>
        <hr>
        <x-recent-project-card-component/>
    </div>
    <div class="container-md recent-news">
        <div class="welcome-header"><h2 class="recent-header">Последние новости</h2>

        </div>
        <hr>
        <x-recent-project-card-component/>

    </div>
@endsection
