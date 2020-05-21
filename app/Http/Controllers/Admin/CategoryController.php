<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        return view('admin.categories.add-category');
    }

    public function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            
            // echo "<pre>"; print_r($data); die;
            $category = new Category();
            $category->category_name = $data['category_name'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();

            return redirect('admin.categories.add-category')->with('status','Category successfully added');
        }
    }
}