<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $products = Product::where('status', true)->get();
        return view('customer.HotpotSoup', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty'        => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        $id   = $request->product_id;

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $request->qty;
        } else {
            $product      = Product::findOrFail($id);
            $cart[$id] = [
                'name'  => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'qty'   => $request->qty,
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true, 'cart_count' => count($cart)]);
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);

        $order = \App\Models\Order::create([
            'order_number' => 'ORD' . time(),
            'table_number' => $request->input('table', 'Unknown'),
            'total'        => $total,
            'status'       => 'Pending',
        ]);

        foreach ($cart as $id => $item) {
            $order->items()->create([
                'order_id'  => $order->id,
                'name'      => $item['name'],
                'quantity'  => $item['qty'],
                'price'     => $item['price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('thankyou');
    }
}
