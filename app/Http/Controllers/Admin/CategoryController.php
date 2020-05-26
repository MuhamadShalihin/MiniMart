<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        $categories = Category::all();
        return view('admin.add-category')->with('categories', $categories);
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

    public function removeCategory(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect('/categories-list')->with('status', 'Categories succesfully deleted');
    }
}