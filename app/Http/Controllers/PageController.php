<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->take(12)->get();
        //dd($products);
        return view('welcome', compact('products'));       
    }
}
