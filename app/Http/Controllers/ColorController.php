<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
   
    public function index()
    {
        $viewBag['colors'] = Color::orderBy('id','desc')->get();
        return view('colors.index', $viewBag);
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show(Color $color)
    {
        //
    }

    public function edit(Color $color)
    {
        //
    }

  
    public function update(Request $request, Color $color)
    {
        //
    }

   
    public function destroy(Color $color)
    {
        //
    }
}
