<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StoreController extends Controller
{

    public function index()
    {
        $viewBag['stores'] = Store::orderBy('id', 'desc')->get();
        return view('stores.index', $viewBag);
    }


    public function create()
    {
        return view('stores.create');
    }


    public function store(Request $request)
    {
    // dd($request);
        // $photo = $request->store_icon;
        // $photoname = uniqid() . '.' . $photo->getClientOriginalExtension();
        // Image::make($photo)->resize(320, 240)->save(public_path('files/icon/' . $photoname));

        try {

            $iconName = NULL;

            if($request->hasFile('store_icon')){
                $icon = $request->file('store_icon');
                $iconName = uniqid() . '.' . $icon->getClientOriginalExtension();
                Image::make($icon)->resize(320, 240)->save(public_path('files/icon/' . $iconName));
            }






            $store = new Store();
            $store->store_name = $request->store_name;
            $store->store_icon = 'files/icon/' . $iconName;
            $store->store_type = $request->store_type;
            $store->save();

            flash('Store Successfully added.')->success();
            return redirect()->route('stores.index');
        } catch (QueryException $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
        flash('Store Successfully added.')->success();
        return redirect()->route('stores.index');
    }


    public function show(Store $store)
    {
        //
    }


    public function edit(Store $store)
    {
        $viewBag['store'] = $store;
        return view('stores.edit', $viewBag);
    }


    public function update(Request $request, Store $store)
    {
        $oldImage = $request->oldImage;
        $photo = $request->store_icon;
        if ($photo) {
            $photoname = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(320, 240)->save(public_path('files/icon/' . $photoname));

            $store->store_name = $request->store_name;
            $store->store_type = $request->store_type;
            $store->store_icon = 'files/icon/'.$photoname;
            if ($store->isDirty()) {
                $store->update();
            }

            unlink($oldImage);

            return redirect()->route('stores.index')
                ->with('success', 'store  updated successfully');
        } else {
            $store->store_name = $request->store_name;
            $store->store_type = $request->store_type;
            if ($store->isDirty()) {
                $store->update();
            }
               
                flash('Store Update Successfully ')->success();
                return redirect()->route('stores.index');
        }
    }


    public function destroy(Store $store)
    {
        // unlink($store->store_icon);
        // $store->delete();

        $image = $store->store_icon;
        if($image){
            if (file_exists(public_path('files/icon/'. $store->image ))) {
                // dd("this");
                unlink(public_path('files/icon/'. $store->image ));
            }
        }

       $store->delete();
        flash('Store Delete Successfully ')->success();
        return redirect()->route('stores.index');
    }
}
