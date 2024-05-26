<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands=Brand::all();
        return view('backend.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand=new Brand();
        $brand->name=$request->name;
        $brand->slug=$request->slug;
        $brand->description=$request->description;
        $brand->save();

        $this->flashMessage('success', 'New Brand created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */

     public function change_status(Brand $brand){
        if($brand->status==1){
            $brand->update(['status'=>0]);
        }else {
            $brand->update(['status'=>1]);
        }

        $this->flashMessage('info', 'Brand active status changed.');
        return redirect()->back();
    }



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $brand = Brand::firstOrFail();
        return view('backend.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {


        $brand->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $this->flashMessage('info', 'Brand updated successfully.');

        return redirect('/brands');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        $this->flashMessage('warning', 'Brand deleted successfully.');
        return redirect()->back();
    }
}
