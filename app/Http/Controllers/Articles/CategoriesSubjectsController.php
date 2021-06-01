<?php

namespace App\Http\Controllers\Articles;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Articles\Category;
use App\Models\Articles\Subject;
use Illuminate\Validation\UnauthorizedException;

class CategoriesSubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth:web' );
        $this->middleware( 'can:manage,' . Category::class );
    }

    public function index( Category $category )
    {
        $subjects = $category->subjects()->ordered()->get();

        return view( 'articles.category.subject.index', compact( 'category', 'subjects' ) );
    }

    public function store( Request $request, Category $category )
    {
        $this->validate( $request, [
            'name' => 'required|max:50',
        ], [], [
            'name' => 'nome',
        ] );

        $category->subjects()->create( $request->only( 'name' ) );

        Toastr::success( 'Tópico adicionado' );

        return redirect()->route( 'articles.categories.subjects.index', compact( 'category' ) );
    }

    public function edit( Category $category, Subject $subject )
    {
        if (!$category->owns( $subject )) {
            throw new UnauthorizedException( 'O tópico não pertence a categoria' );
        }

        return view( 'articles.category.subject.edit', compact( 'category', 'subject' ) );
    }

    public function update( Request $request, Category $category, Subject $subject )
    {
        if (!$category->owns( $subject )) {
            throw new UnauthorizedException( 'O tópico não pertence a categoria' );
        }

        $this->validate( $request, [
            'name' => 'required|max:50',
        ], [], [
            'name' => 'nome',
        ] );

        $subject->fill( $request->only( 'name' ) )->save();

        Toastr::success( 'Tópico atualizado' );

        return redirect()->route( 'articles.categories.subjects.index', compact( 'category' ) );
    }

    public function destroy( Category $category, Subject $subject )
    {
        if (!$category->owns( $subject )) {
            throw new UnauthorizedException( 'O tópico não pertence a categoria' );
        }

        $subject->delete();

        Toastr::success( 'Tópico removido' );

        return redirect()->route( 'articles.categories.subjects.index', compact( 'category' ) );
    }
}
