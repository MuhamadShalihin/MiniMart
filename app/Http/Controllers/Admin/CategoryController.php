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
            'catName' => 'required',
            'slug' => 'required',
        ]);

        Category::create($validation);

        dd($validation);

        return back()->with('status','Category successfully added');
    }
}