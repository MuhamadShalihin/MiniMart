<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function viewProduct()
    {
        $products = Product::orderBy('id')->paginate(10);
        return view('admin.add-product', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $validation = $this->validate($request, [
            'name' => 'required | string',
            'slug' => 'required | string',
            'price' => 'required | numeric',
            'image' => 'required | image | mimes:jpeg',
            'description' => 'required | string'
        ]);

        if ($files = $request->file('image'))
        {
            $destinationPath = public_path('/assets/images/products/');

            $image = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);

            $insert['image'] = "$image";

            $imageModel = new Photo();
            $imageModel->image = "$image";
            $imageModel->save();
        }
        
        Product::create($validation);

        return back()->with('status', 'Product succesfully added');
    }
}
