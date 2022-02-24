<?php

namespace App\Http\Controllers;
use App\Models\brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
   
    public function index()
    {
        $viewBag['brands'] = brand::orderBy('id','desc')->get();
        return view('brands.index', $viewBag);
    }

   
    public function create()
    { 
         return view('brands.create');
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:brands'
        ]);
        brand::insert([
            'name' => $request->name,
        ]);
      flash('brands Add Successfully ')->success();
      return redirect()->route('brands.index');
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
