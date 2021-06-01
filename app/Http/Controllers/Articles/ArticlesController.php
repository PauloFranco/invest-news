<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\Articles\CreateNewArticle;
use App\Models\Articles\Category;
use App\Models\Articles\Article;
use Illuminate\Validation\UnauthorizedException;

class ArticlesController extends Controller
{
    public function __construct()
    {
       
    }

    public function index( Request $request )
    {

        //dd($request->get('filtro'));

        $articles = Article::with( [ 'subject.category' ] )
            ->ordered()
            ->filtered( $request->get( 'filtro' ) )
            ->paginate( config( 'app.pagination' ) );


        $categories = Category::ordered()->get();

        $empty = $articles->count() == 0;

        return view( 'articles.article.index', compact( 'articles', 'categories', 'empty' ) );
    }

    public function show( Article $article )
    {
        return view( 'articles.article.show', compact( 'article' ) );
    }

    

    public function create( Category $category )
    {
        $subjects = $category->subjects()->ordered()->get();

        if ($subjects->isEmpty()) {
            throw new UnauthorizedException( 'Não há assuntos cadastrados na categoria: ' . $category->name );
        }

        return view( 'articles.article.create', compact( 'category', 'subjects' ) );
    }

    public function store( Request $request )
    {





        $this->validate( $request, [
            'description' => 'required|max:250',
            'subject_id'  => 'required|exists:subjects,id',
            'comment'     => 'required|max:3000',
        ], [], [
            'description' => 'título',
            'subject_id'  => 'tópico',
            'comment'     => 'texto',
        ] );

        $article = new Article;

        $article->name       =   $request->get( 'description' );
        $article->subject_id =   $request->get( 'subject_id' );
        $article->comment    =   $request->get( 'comment' );

        $article->save();


        return redirect()->route( 'articles.index' );
    }
}
