<?php

namespace App\Http\Controllers;
use App\Models\Size;

use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function index()
    {
        $viewBag['sizes'] = Size::orderBy('id','desc')->get();
        return view('sizes.index', $viewBag);
    }

    
    public function create()
    {
        return view('sizes.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|unique:categories'
        ]);
        Size::insert([
            'name' => $request->name,
        ]);
      flash('Size Successfully add')->success();
      return redirect()->route('sizes.index');
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
