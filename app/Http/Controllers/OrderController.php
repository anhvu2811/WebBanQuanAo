<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

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


    public function add(Request $request)
    {
        $order = new Order();
        $order->order_date = Carbon::now()->format('Y-m-d H:i:s');
        $order->customer_name = $request->input('billingName') ?? '';
        $order->phone = $request->input('billingPhone') ?? '';
        $order->email = $request->input('email') ?? '';
        $order->total_price = str_replace('.', '', $request->input('total_price')) ?? 0;
        $order->coupon_code = '';
        $order->payment_method = '';
        $order->payment_status = '';
        $order->shipping_address = $request->input('billingAddress') ?? '';
        $order->notes = $request->input('note') ?? '';
        $order->save();

        $cart = session('cart');
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->size_id = $item['size_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }
        session()->forget('cart');
        return view('page.thankyou');
    }
}
