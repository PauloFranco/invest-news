@extends('articles.layout')

@section('title', make_title('Artigo ' . $article->id))

@section('header')
    @include('articles.article.partials.header', [
        'article' => $article,
        'title'  => $article->label,
        'except' => [ 'show' ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8">
            @yield('sub-content')
        </div>
    </div>
@endsection
