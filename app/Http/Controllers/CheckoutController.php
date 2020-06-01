<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Order;
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

            $customer = auth()->user();
            $customer->bank_name = $request->bank_name;
            $customer->card_number = $request->card_number;
            $customer->expiry_date = Carbon::parse($request->expiry_date);
            $customer->cvv2 = $request->cvv2;
            $customer->save();

            $order = new Order(); 
            $order->user()->associate($customer);
            $order->save();

            // dd($categories);

            $carts = session()->get('cart');
            $total = 0;
            $charge = 5;
            $grand = 0;
            
            foreach ($carts as $cart)
            {
                $product = $products->where('name', $cart['name'])->first();
                $product->orders()->attach($order, ['amount' => $cart['quantity']]);
            }

            session()->forget('cart');

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
