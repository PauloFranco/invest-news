@extends('articles.article.partials.layout')

@section('content')
<div class="mrg-bottom-15">
    <h4 class="no-margin-bottom">{{ $article->present()->subject }}</h4>

</div>
<h1 class="no-margin-bottom">{{ $article->present()->name }}</h1>


<p>{{ $article->present()->comment }}</p>


@endsection
