<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('backend.pages.category.index',compact('categories'));
    }

    public function create()
    {
        return view('backend.pages.category.create');
    }

    public function store(Request $request)
    {
        $category=new Category;
        $category->id=$request->id;
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->description=$request->description;

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('category',$filename);
            $category->image= url('/category', $filename);
        }

        $category->save();
        $this->flashMessage('success', 'New Category created successfully.');
        return redirect()-> back();
    }
    

    public function change_status(Category $category){
        if($category->status==1){
        $category->update(['status'=>0]);
        }else {
        $category->update(['status'=>1]);
        }

        $this->flashMessage('info', 'Category active status changed.');
        return redirect()->back();
    }

    public function edit(Category $category)
    {
        return view('backend.pages.category.edit',compact('category'));
    }



    public function update(Request $request, Category $category)
    {
        if ($request->hasFile('image')) {
            if (file_exists(public_path('category/'.$category->image))) {
                unlink(public_path('category/'.$category->image));
            }
            $fileName = time().'.'.$request->image->extension();
            $request->image->move('category/', $fileName);
            $category->image = url('/category',$fileName);
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $this->flashMessage('info', 'Category updated successfully.');

        return redirect('/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $this->flashMessage('warning', 'Category deleted successfully.');
        return redirect()->back();
    }
}
