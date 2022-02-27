<?php

namespace App\Http\Controllers;
use App\Models\Size;
use App\Http\Requests\size\StoreSizeRequest;
use App\Http\Requests\size\UpdateSizeRequest;
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

    
    public function store(StoreSizeRequest $request)
    {
       
        try {
            $size = new Size();
            $size->name = $request->name;
            $size->save();

            flash('SIze Successfully added.')->success();
            return redirect()->route('sizes.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Size $size)
    {
        $viewBag['size'] = $size;
        return view('sizes.edit',$viewBag);
    }

   
    public function update(UpdateSizeRequest $request, $id)
    {
        $size=Size::findOrFail($id);
        $size->name = $request->name;
        if($size->isDirty()){
            $size->update();
}
        flash('Size Update Successfully ')->success();
        return redirect()->route('sizes.index');
    }

  
    public function destroy(Size $size)
    {
        $size->delete();
        flash('Size Delete Successfully ')->success();
return redirect()->route('sizes.index');
    }
}
