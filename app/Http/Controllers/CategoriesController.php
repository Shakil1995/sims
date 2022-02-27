<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function index()
    {
        $viewBag['categories'] = Category::orderBy('id','desc')->get();
        return view('categories.index', $viewBag);
    }

    public function create()
    {
       return view('categories.create');
    }

  
    public function store(StoreCategoryRequest $request)
    {
    try {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        flash('Category Successfully added.')->success();
        return redirect()->route('categories.index');
    } catch (\Throwable $th) {
        throw $th;
    }

    }

    
    public function show($id)
    {
      
    }

  
    public function edit(Category $category)
    {
    $viewBag['category'] = $category;
    return view('categories.edit',$viewBag);
    }

  
    public function update(UpdateCategoryRequest $request,Category $category)
    {

        $category = $category;
        $category->name = $request->name;
        if($category->isDirty()){
            $category->update();
}
        flash('Category Update Successfully ')->success();
        return redirect()->route('categories.index');
    }

  
    public function destroy(Category $category)
    {
        $category = $category;
        $category->delete();
        flash('Category Delete Successfully ')->success();
    return redirect()->route('categories.index');
    }
}
