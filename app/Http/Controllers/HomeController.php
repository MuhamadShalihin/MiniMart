<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
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
            $products = Product::inRandomOrder()->take(4)->get();
            $categories = Category::all();

            return view('index')->with([
                'products' => $products,
                'categories' => $categories,
            ]);
        }
    }

    public function home()
    {
        if (request()->category) 
        {
            $products = Product::with('categories')->whereHas('categories', function($query)
            {
                $query->where('index', request()->category);
            });
            $categories = Category::all()->get();
        }

        else 
        {
            $products = Product::inRandomOrder()->take(4)->get();
            $categories = Category::all();

            return view('index')->with([
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
