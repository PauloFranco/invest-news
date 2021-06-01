<?php

use Illuminate\Support\Facades\Route;

/** @var \Illuminate\Routing\Router $router */



$router->group( [ 'namespace' => 'Articles' ],
    function ( $router ) {
        /** @var \Illuminate\Routing\Router $router */

        $router->get( '/', [ 'uses' => 'ArticlesController@index', 'as' => 'home' ] );


        $router->group( [ 'prefix' => '/articles', 'as' => 'articles.' ], function ( $router ) {
            /** @var \Illuminate\Routing\Router $router */

            $router->resource( 'categories', 'CategoriesController', [
                'parameters' => [ 'categories' => 'articles_category' ],
                'except'     => [ 'show' ]
            ] );

            $router->resource( 'categories.subjects', 'CategoriesSubjectsController', [
                'parameters' => [
                    'categories' => 'articles_category',
                    'subjects'   => 'articles_subject',
                ],
                'only'       => [ 'index', 'store', 'edit', 'update', 'destroy' ]
            ] );
        } );

        $router->get( '/articles/create/{category}', [
            'uses' => 'ArticlesController@create',
            'as'   => 'articles.create',
        ] );

        $router->resource( 'articles', 'ArticlesController', [
            'parameters' => [ 'articles' => 'article' ],
            'only'       => [ 'index', 'show', 'store' ]
        ] );
    }
);
