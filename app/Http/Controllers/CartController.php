<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cart()
    {
        $setting = Setting::first();
        return view('page.cart', compact('setting'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        $cart = session()->get('cart', []);

        $productExists = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $request->product_id && $item['size_id'] == $request->size_id) {
                $item['quantity'] += $request->quantity;
                $productExists = true;
                break;
            }
        }
        if (!$productExists) {
            $cart[] = [
                'product_id' => $product->id,
                'size_id' => $request->size_id,
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'image' => $product->images->first()->image_url,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function remove($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
        }
        $cart = array_values($cart);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    public function checkout()
    {
        return view('page.checkout');
    }


}
