<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.manage-category')->with('categories', $categories);
    }

    public function addCategory(Request $request)
    {
        $validation = $this->validate($request, [
            'cat_name' => 'required',
            'slug' => 'required',
        ]);

        Category::create($validation);

        return back()->with('status','Category successfully added');
    }

    public function editCategory(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        return view ('admin.manage-category-edit')->with('categories', $categories);
    }

    public function updateCategory(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->cat_name = $request->input('name');
        $categories->slug = $request->input('slug');

        $categories->save();

        return redirect('/categories-list')->with('status', 'Product succesfully updated');
    }

    public function removeCategory(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect('/categories-list')->with('status', 'Categories succesfully deleted');
    }
}