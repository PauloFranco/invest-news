@extends('articles.article.partials.layout')

@section('sub-content')
    <h4>Histórico completo</h4>

    @include('articles.article.partials.events', ['events' => $article->events])
@endsection
