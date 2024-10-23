@foreach ($recentNews as $recentNewsItem)
    <div class="card border-secondary news-card">
        <div class="card-body" style="position: relative">
            <a href="" class="card-link"><h5 class="card-title">{{$recentNewsItem->title}}</h5></a>
            <div class="card-text">{{$recentNewsItem->preview}}</div>
            <div class="text-muted" style="position: absolute; bottom:100%;">Автор: {{$recentNewsItem->user->login}}
                <img src="{{$recentNewsItem->user->photo}}" alt="photo" height="25px" width="25px"/>
                Дата: {{date_format($recentNewsItem->created_at,"d/m/Y  H:i")}}</div>

        </div>
    </div>
@endforeach
