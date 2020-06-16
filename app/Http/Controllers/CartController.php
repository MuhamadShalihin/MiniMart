<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;

class CartController extends Controller
{
    public function cart()
    {
        if (request()->category) 
        {
            $products = Product::with('categories')->whereHas('categories', function($query)
            {
                $query->where('slug', request()->category);
            });
            $categories = Category::all()->get();
        }

        else 
        {
            $products = Product::inRandomOrder()->take(4)->get();
            $categories = Category::all();

            return view('cart')->with([
                'products' => $products,
                'categories' => $categories,
            ]);
        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) 
        {
            $cart =
            [
                $id =>
                [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                ]
            ];

            session()->put('cart', $cart);

            return redirect('/cart')->with('success_message', 'Item(s) added to cart successfully');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success_message', 'Item(s) added to cart successfully');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] =
            [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];

        session()->put('cart', $cart);

        return redirect('/cart')->with('success_message', 'Item(s) added to cart successfully');
    }

    public function reorder($id)
    {
        $user = auth()->user();
        $lastOrder = $user->orders()->findOrFail($id);
        $products = $lastOrder->products;

        $cart = [];
        foreach($products as $product) 
        {
           $cart[$product->id] = [ // that means $product is not valid variable
               "name" => $product->name,
               "quantity" => $product->pivot->amount,
               "price" => $product->price,
           ];
        }

        session()->put('cart', $cart);
        return redirect('/cart')->with('success_message', 'Item(s) added to cart successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success_message', 'Quantity updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success_message', 'Item(s) removed successfully');
        }
    }
}
