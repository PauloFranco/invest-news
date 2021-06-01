<li class="list-group-item">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="no-margin-top">{{ $article->present()->label }} <small>{{ $article->present()->category }} <small>[{{$article->present()->subject}}]</small></small></h4>

            @include('articles.article.partials.card-content', compact('article'))
        </div>

        <hr class="visible-xs-block mrg-v-10">

        <div class="col-sm-4 text-right no-wrap">
            @include('articles.article.partials.action-buttons', [
                'article'    => $article,
                'showLabel' => false,
                'except'    => [ 'back' ],
            ])
        </div>
    </div>
</li>
