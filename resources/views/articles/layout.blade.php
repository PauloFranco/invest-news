@extends('layouts.app')

@section('title', make_title('Artigos'))

@section('nav-bar')
    <ul class="nav navbar-nav">
        <li class="{{ !route_is('articles.categories.*') ? 'active' : '' }}">
            <a href="{{ route('articles.index') }}">Artigos</a>
        </li>

        <li class="{{ route_is('articles.categories.*') ? 'active' : '' }}">
            <a href="{{ route('articles.categories.index') }}">Categorias</a>
        </li>
    </ul>
@endsection
