<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'qty' => ($cart[$product->id]['qty'] ?? 0) + 1
        ];
        session()->put('cart', $cart);

        return back()->with('success', 'Added to cart!');
    }

    public function index()
    {
        return view('cart', [
            'title' => 'Your Cart'
        ]);
    }
}

