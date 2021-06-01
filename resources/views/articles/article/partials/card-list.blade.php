<ul class="list-group">
    @forelse($articles as $article)
        @include('articles.article.partials.card', compact('article'))
    @empty
        <li class="list-group-item text-center text-muted">
            Use o botão
            @include('articles.article.partials.create-button', [ 'show' => true ])
            para cadastrar o primeiro article.
        </li>
    @endforelse
</ul>
