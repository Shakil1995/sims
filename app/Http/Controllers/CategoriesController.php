<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
       return view('categories.create');
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:categories'
        ]);
        Category::insert([
            'name' => $request->name,
        ]);
      flash('Category Successfully add')->success();
      return back();
    
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
