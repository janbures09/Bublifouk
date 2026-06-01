<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product; 

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('welcome', compact('categories', 'products'));
    }

    public function showCategory($id)
    {
        $categories = Category::all();
        $currentCategory = Category::findOrFail($id);
        $products = $currentCategory->products;

        return view('welcome', compact('categories', 'products', 'currentCategory'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }
}