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
            'image' => 'required | image | mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required | string'
        ]);

        if ($files = $request->file('image'))
        {
            $destinationPath = public_path('/assets/images/products/');

            $image = $validation['slug']  . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);

            $validation['image'] = "$image";
        }
        
        Product::create($validation);

        return back()->with('status', 'Product succesfully added');
    }

    public function removeProduct(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect('/products-list')->with('status', 'Product succesfully deleted');
    }
}
