<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('user')->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->id_user = $request->input('id_user');

        $category->save();
        
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        
        $category->name = $request->input('name');

        $category->description = $request->input('description');

        $category->save();

        notify()->success('Categoria editada com sucesso.', 'Yes! :)');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if(!$category) {
            return redirect()->route('categorys.index')->with('error', 'Categoria não encontrado.');
        }

        $category->delete();

        notify()->success('Categoria excluída com sucesso.', 'Yes! :)');

        return redirect()->route('categories.index');
    }

    public function searchForCategory(Request $request)
    {
        $search = $request->input('search');

        $categories = Category::where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('description', 'LIKE', '%'.$search.'%')
            ->get();

        return view('categories.index', compact('categories'));
    }
}
