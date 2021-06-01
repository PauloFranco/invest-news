<?php

namespace App\Http\Controllers\Articles;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Articles\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth:web' );
        $this->middleware( 'can:manage,' . Category::class );
    }

    public function index()
    {
        $categories = Category::withCount( [ 'articles', 'subjects' ] )
            ->ordered()
            ->get();

        return view( 'articles.category.index', compact( 'categories' ) );
    }

    public function create()
    {
        $category = new Category;

        return view( 'articles.category.create', compact( 'category' ) );
    }

    public function store( Request $request )
    {
        $this->validate( $request, [
            'name' => 'required|max:150',
        ], [], [
            'name' => 'nome',
        ] );

        $category = Category::create( $request->only( 'name' ) );

        Toastr::success( 'Categoria criada' );

        return redirect()->route( 'articles.categories.edit', compact( 'category' ) );
    }

    public function edit( Category $category )
    {
        return view( 'articles.category.edit', compact( 'category' ) );
    }

    public function update( Request $request, Category $category )
    {
        $this->validate( $request, [
            'name' => 'required|max:150',
        ], [], [
            'name' => 'nome',
        ] );

        $category->fill( $request->only( 'name' ) )->save();

        Toastr::success( 'Categoria atualizada' );

        return redirect()->route( 'articles.categories.index' );
    }

    public function destroy( Category $category )
    {
        $category->delete();

        Toastr::success( 'Categoria removida' );

        return redirect()->back();
    }
}
