<?php

namespace App\Providers;

use App\Models\Articles\Category;
use App\Models\Articles\Article;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ArticlesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer( 'articles.article.partials.sidebar', function ( $view ) {
            /** @var \Illuminate\View\View $view */

            /** @var Article $article */
            $article = $view[ 'article' ];

            $view->with( 'article', $article );
        } );

        View::composer( 'articles.article.partials.create-button', function ( $view ) {
            /** @var \Illuminate\View\View $view */

            $categories = Category::ordered()
                ->withSubjects()
                ->get();

            $view->with( 'categories', $categories );
        } );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
