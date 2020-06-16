<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders;

        // in laravel, you can access values via relationships, which is why correct relationship linking is so important
        // the primary concept of laravel is the model and the relationships between it
        // with correct linking, you can easily access any values the the controllers or views may require
        // since to access the values you can go through the relationship, which is logical if you linked it correctly
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

            return view('customer.order')->with([
                'products' => $products,
                'categories' => $categories,
                'orders' => $orders
            ]);
        }  
        
    }

    public function viewHistory() //next issue is this one. so i created a page that users can reorder the same thing + add items from last purchase from order history but idk how 
    {
        $orders = auth()->user()->orders; // i mean how to link this with cart and make the cart retrieve the items from order history?

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

            return view('customer.order-history')->with([
                'products' => $products,
                'categories' => $categories,
                'orders' => $orders
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
        //
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
