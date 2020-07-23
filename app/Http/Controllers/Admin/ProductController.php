<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function viewProduct()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(5);
        $categories = Category::all();
        return view('admin.manage-product', compact('products', 'categories'));
    }

    public function addProduct(Request $request)
    {
        $validation = $this->validate($request, [
            'name' => 'required | string',
            'slug' => 'required | string',
            'category' => 'required | string',
            'price' => 'required | numeric',
            'image' => 'required | image | mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required | string'
        ]);

        if ($files = $request->file('image'))
        {
            $destinationPath = public_path('/assets/images/products/');

            $image = $validation['slug'] . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image);

            $validation['image'] = "$image";
        }
        
        $product = Product::create($validation);

        $product->categories()->attach($request->category);

        return back()->with('status', 'Product succesfully added');
    }

    public function editProduct(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        return view ('admin.manage-product-edit')->with('products', $products);
    }

    public function updateProduct(Request $request, $id)
    {
        $products = Product::find($id);
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->price = $request->input('price');
        $products->stock_qty = $request->input('stock');
        $products->image = $request->input('image');
        $products->description = $request->input('description');

        $products->save();

        return redirect('/products-list')->with('status', 'Product succesfully updated');
    }

    public function removeProduct(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect('/products-list')->with('status', 'Product succesfully deleted');
    }
}
