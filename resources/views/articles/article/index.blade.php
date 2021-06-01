@extends('articles.layout')

@section('title', make_title('Artigos'))

@section('header')
    @include('articles.article.partials.header', [
        'article' => null,
        'title'  => 'Notícias',
        'except' => [ 'view' ],
    ])
@endsection

@section('content')
    <div class="input-group-btn">
        <form action="{{ route('articles.index')}}" id="filterform" name="filterform" method="GET">
            <input type="text" name="filtro" id="filtro" class="form-control"
            autofocus placeholder="Ex.: Seleção ganha de 9x0"
            value="{{ old('filtro') }}">            
            <button type="submit" name="submit" id="submit" class="btn btn-default ">Filtrar</span>
            </button>
        </form>
    </div>

    @if($empty)
    <p style="color:red">Sem artigos para o filtro selecionado</p>
    @endif

        <div class="text-right mrg-bottom-15">
            @include('articles.article.partials.create-button', [
                'show' => true,
            ])
        </div>

        @include('articles.article.partials.card-list')

        <div class="text-center">{{ $articles->render() }}</div>

    
@endsection
