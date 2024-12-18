<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10);
        $orders = Order::paginate($perPage);
        return view('order.index')->with('orders', $orders);
    }


    // public function destroy(string $id)
    // {
    //     $Order = Order::find($id);
    //     if($Order) {
    //         $Order->delete();
    //         return redirect()->route('Order.index');
    //     }
    //     return redirect()->route('Order.index');
    // }
}
