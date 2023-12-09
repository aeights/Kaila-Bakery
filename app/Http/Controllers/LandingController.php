<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('home.landing.index');
    }

    public function product()
    {
        return view('home.product.index');
    }

    public function cart()
    {
        return view('home.cart.index');
    }
    
    public function blog()
    {
        return view('home.blog.index');
    }

    public function about()
    {
        return view('home.about.index');
    }

    public function contact()
    {
        return view('home.contact.index');
    }
}
