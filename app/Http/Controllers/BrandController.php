<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Http\Requests\brand\StoreBrandRequest;
use App\Http\Requests\brand\UpdateBrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $_getColumns = (['id', 'name']);
    public function index()
    {
        $viewBag['brands'] = Brand::orderBy('id','desc')->get($this->_getColumns);
        return view('brands.index', $viewBag);
    }

   
    public function create()
    { 
         return view('brands.create');
    }

   
    public function store(StoreBrandRequest $request)
    {
      
      try {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        flash('Brand Successfully added.')->success();
        return redirect()->route('brands.index');
    } catch (\Throwable $th) {
        throw $th;
    }
    }

    public function show($id)
    {

    }

    public function edit(Brand $brand)
    {
        
        $viewBag['brand'] = $brand;
        return view('brands.edit',$viewBag);
    }

   
    public function update(UpdateBrandRequest $request, $id)
    {
        $brnad=Brand::findOrFail($id);
        $brnad->name = $request->name;
        if($brnad->isDirty()){
            $brnad->update();
        }
        flash('Brnad Update Successfully ')->success();
        return redirect()->route('brands.index');
    }

  
    public function destroy(Brand $brand)
    {
        $brand->delete();
        flash('Brand Delete Successfully ')->success();
  return redirect()->route('brands.index');
    }
}
