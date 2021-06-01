@extends('articles.layout')

@section('title', make_title('Novo artigo'))

@section('header')
    @include('articles.article.partials.header', [
        'article' => null,
        'title'  => new \Illuminate\Support\HtmlString( "Novo article <small>{$category->present()->name}</small>"),
        'except' => [ 'show' ],
    ])
@endsection

@section('content')
    <form action="{{route('articles.store')}}" method="POST" accept-charset="UTF-8">
        {{ form_fields('POST') }}

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description" class="control-label">Título</label>

            <input type="text" name="description" id="description" class="form-control"
                   required autofocus placeholder="Ex.: Seleção ganha de 9x0"
                   value="{{ old('description') }}">

            @include('common.form.errors', ['field' => 'description'])
        </div>

        <div class="form-group {{ $errors->has('subject_id') ? 'has-error' : '' }}">
            <label for="subject_id" class="control-label">Assunto</label>

            {{ \App\Presenters\Models\Articles\Subject::asCombo($subjects, 'subject_id', old('subject_id')) }}

            @include('common.form.errors', ['field' => 'subject_id'])
        </div>

        <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
            <label for="comment">Descrição</label>

            <textarea name="comment" id="comment" rows="10" class="form-control"
                      placeholder="Escreva os detalhes da notícia"
                      required>{{ old('comment') }}</textarea>

            @include('common.form.errors', ['field' => 'comment'])
        </div>

        <hr>

        <div class="form-group text-right">
            <a href="{{ route('articles.index') }}" tabindex="-1"
               class="btn btn-link">cancelar</a>

            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-plus"></i> criar</button>
        </div>
    </form>
@endsection
