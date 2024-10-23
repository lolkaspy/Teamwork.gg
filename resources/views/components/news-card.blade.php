
@foreach ($news as $newsItem)
<div class="card border-secondary news-card">
    <div class="card-body" style="position: relative">
    <a href="" class="card-link"><h5 class="card-title">{{$newsItem->title}}</h5></a>
    <div class="card-text">{{$newsItem->preview}}</div>
    <div class="text-muted" style="position: absolute; bottom:100%;">
        Автор: {{$newsItem->user->login}}
        <img src="{{$newsItem->user->photo}}" alt="photo" height="25px" width="25px"/>
        Дата: {{date_format($newsItem->created_at,"d/m/Y  H:i")}}</div>
    </div>
</div>
@endforeach
<hr>
{{$news->withQueryString()->links()}}
