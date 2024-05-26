<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('backend.pages.product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.pages.product.create', compact('brands', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = 'product_' . time() . '_' . $image->getClientOriginalName();
                $image->move('images/product/', $imageName);
                $imagePaths[] = url('images/product/' . $imageName);
            }
        }

        Product::create([
            'images' => implode(',', $imagePaths),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'qty' => $request->qty,
            'sku' => $request->sku,
            'regular_price' => $request->regular_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'brand_id' => $request->brand_id,
            'category_id' => implode(',', $request->category_id)
        ]);

        $this->flashMessage('success', 'New product created successfully.');
        return redirect()->back();
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::get();
        $categories = Category::all();
        return view('backend.pages.product.edit', compact('product', 'brands', 'categories'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('images')) {
            foreach (explode(',', $product->images) as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }
    
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = 'product_' . time() . '_' . $image->getClientOriginalName();
                $image->move('images/product/', $imageName);
                $imagePaths[] = url('images/product/' . $imageName);
            }
        }
    
        $product->update([
            'brand_id' => $request->brand_id,
            'category_id' => implode(',', $request->category_id),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'qty' => $request->qty,
            'sku' => $request->sku,
            'regular_price' => $request->regular_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'images' => isset($imagePaths) ? implode(',', $imagePaths) : $product->images,
        ]);

        $this->flashMessage('info', 'Product Updated successfully.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        $this->flashMessage('warning', 'Product deleted successfully.');
        return redirect()->back();
    }
}
