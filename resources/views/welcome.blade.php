@extends('layouts.app')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-md landing-welcome-text" id="dynamic-bg">
    <h1 class="welcome-h1">Место, в которое <br>хочется  возвращаться <br><span class="landing-welcome-placeholder"  id="dynamic-text">всегда!</span></h1>
    </div>
    <div class="container-md recent-projects fade-in">
        <div class="welcome-header"><h2 class="recent-header">Недавние проекты</h2> </div>
        <hr>
        <x-recent-project-card-component :recentProjects="$recentProjects"/>
    </div>
    <div class="container-md recent-news fade-in">
        <div class="welcome-header"><h2 class="recent-header">Последние новости</h2>
        </div>
        <hr>
        <x-recent-news-card-component :recentNews="$recentNews"/>
    </div>
@endsection
