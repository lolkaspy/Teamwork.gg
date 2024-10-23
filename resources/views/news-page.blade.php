@extends('layouts.app')
@section('content')
    <div class="container mt-5"><h1>Новости</h1>
        <hr>
    <x-news-card :news="$news"/>
    </div>
@endsection
