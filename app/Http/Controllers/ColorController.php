<?php

namespace App\Http\Controllers;
use App\Http\Requests\color\StoreColorRequest;
use App\Http\Requests\color\UpdateColorRequest;
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
        return view('colors.create');
    }

   
    public function store(StoreColorRequest $request)
    {
        // dd($request);
        try {
            $Color = new Color();
            $Color->color_name = $request->color_name;
            $Color->save();

            flash('Color Successfully added.')->success();
            return redirect()->route('colors.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

  
    public function show(Color $color)
    {
        //
    }

    public function edit(Color $color)
    {
        $viewBag['color'] = $color;
        return view('colors.edit',$viewBag);
    }

  
    public function update(UpdateColorRequest $request, Color $color)
    {
        $color = $color;
        $color->color_name = $request->color_name;
        if($color->isDirty()){
            $color->update();
}
        flash('Color Update Successfully ')->success();
        return redirect()->route('colors.index');
    }

   
    public function destroy(Color $color)
    {
        $color->delete();
        flash('Color Delete Successfully ')->success();
    return redirect()->route('colors.index');
    }
}
