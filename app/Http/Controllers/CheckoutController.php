<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillingDetails;
use App\Category;
use App\Product;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            $products = Product::all();
            $categories = Category::all();

            return view('checkout')->with([
                'products' => $products,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            $products = Product::all();
            $categories = Category::all();

            // dd($categories);

            $carts = session()->get('cart');
            $total = 0;
            $charge = 5;
            $grand = 0;

            foreach ($carts as $cart)
            {
                $total = $total + ($cart->price * $cart->quantity);
                $grand += $total + ($total * $charge)/100;
                $itemName = $cart->name;
                $itemPrice = $cart->price;
                $itemQty = $cart->quantity;
            }

            $customer = new BillingDetails();
            
            $customer->email = $request->email;
            $customer->name = $request->name;
            $customer->street = $request->street;
            $customer->state = $request->state;
            $customer->postal_code = $request->postalcode;
            $customer->phone = $request->phone;
            $customer->product_name = $itemName;
            $customer->quantity =  $itemQty;
            $customer->price = $itemPrice;
            $customer->total_price = number_format($total, 2);
            $customer->grand_total = number_format($grand, 2);

            // $product->categories()->attach($request->category);
        
            // dd($itemName);

            $customer->save();

            return redirect('thank-you')->with('success_message', 'Order succesfully placed', [
                'products' => $products,
                'categories' => $categories,
            ]);
        } 
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
