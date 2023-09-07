<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartsController extends Controller
{
    public function cart()
    {
        return view('cart.index');
    }

    public function addToCart($id)
    {
        $product = Product::FindOrFail($id);
        $cartItems = session()->get('cartItems', []);
        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity']++;
        } else {
            $cartItems[$id] = [
                "image_path" => $product->image_path,
                "name" => $product->name,
                "brand" => $product->brand,
                "details" => $product->details,
                "price" => $product->price,
                "quantity" => 1,
            ];
        }

        session()->put('cartItems', $cartItems);
        return redirect()->route('cart')->with('success', 'Product added to Cart');
    }

    public function deleteFromCart(Request $request)
    {
        if ($request->id) {
            $cartItems = session()->get('cartItems');

            if (isset($cartItems[$request->id]))
            {
                unset($cartItems[$request->id]);
                session()->put('cartItems', $cartItems);
            }

            return redirect()->back()->with('success', 'Product added to Cart');
        }
    }
}
