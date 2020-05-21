<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use App\Product;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfileView()
    {

        if (Auth::user()) 
        {
            $users = User::find(Auth::user()->id);

            if ($users) 
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

                    return view('customer.profile.view')->with([
                        'users' => $users,
                        'products' => $products,
                        'categories' => $categories,
                    ]);
                }
            } 
            
            else 
            {
                return redirect()->back();
            }
        } 
        
        else 
        {
            return redirect()->back();
        }
        
    }
  
    public function postProfile(Request $request)
    {
        $users = User::find(Auth::user()->id);
        $users->name = $request->input('name');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->street = $request->input('street');
        $users->state = $request->input('state');
        $users->postal_code = $request->input('postal_code');

        $users->save();

        return redirect('/myprofile')->with('status', 'Succesfully updated');
    }
}
