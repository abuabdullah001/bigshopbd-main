<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $products = Product::SimplePaginate(30);
        return view('frontend.home.index', compact('sliders', 'products'));
    }

    public function showProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $brand = Brand::get()->first();

        $categoryIds = explode(',', $product->category_id);
        $categories = Category::whereIn('id', $categoryIds)->pluck('name', 'id');

        return view('frontend.pages.product', compact('product', 'brand', 'categories'));
    }

    public function productSearch(Request $request){
        if($request->search){
            $search = $request->search;
            $products = Product::where('name', 'like', "%$search%")->get();
            return view('frontend.pages.searchProduct', compact('products'));
        }else {
            return redirect()->route('index');
        }
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->with('products')->firstOrFail();
        return view('frontend.pages.categoryProduct', compact('category'));
    }
}