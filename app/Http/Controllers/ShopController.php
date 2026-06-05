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


    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produkt ' . $product->name . ' byl úspěšně přidán do košíku!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Košík byl úspěšně vyprázdněn.');
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            
            unset($cart[$id]);
            
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Položka byla odstraněna.');
    }

    public function updateQuantity($id, Request $request)
    {
        $action = $request->input('action');
        
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            
            if($action === 'increase') {
                $cart[$id]['quantity']++;
            } elseif($action === 'decrease') {
                $cart[$id]['quantity']--;
            }

            if($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);            
        }

        return redirect()->back();
    }
}