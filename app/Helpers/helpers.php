<?php

use Illuminate\Support\Arr;


function make_title( $title = null )
{
    $title = Arr::wrap( $title );

    array_push( $title, config( 'app.name' ) );

    return join( ' - ', $title );
}

function route_is( $name )
{
    return \Illuminate\Support\Str::is( $name, request()->route()->getName() );
}

function request_is( $path )
{
    return request()->is( "*{$path}*" );
}

function form_fields( $method )
{
    $method = strtoupper( $method );

    return new \Illuminate\Support\HtmlString( view( 'common.form.defaults', compact( 'method' ) ) );
}