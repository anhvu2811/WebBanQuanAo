<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductSize;
use Carbon\Carbon;
use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;

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


    public function addOrder(Request $request)
    {
        $order = new Order();
        $order->order_date = Carbon::now()->format('Y-m-d H:i:s');
        $order->customer_name = $request->input('billingName') ?? '';
        $order->phone = $request->input('billingPhone') ?? '';
        $order->email = $request->input('email') ?? '';
        $order->total_price = str_replace('.', '', $request->input('total_price')) ?? 0;
        $order->coupon_code = '';

        $method = $request->input('paymentMethod');
        if($method = 'COD') {
            $status = 'Pending';
        } else if($method = 'Credit Card' || $method = 'Paypal') {
            $status = 'Completed';
        } else {
            $status = 'Failed';
        }
        $order->payment_method = $method;
        $order->payment_status = $status;
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

            // update stock quantity
            $productSize = ProductSize::where('product_id', $item['product_id'])
                                      ->where('size_id', $item['size_id'])
                                      ->first();
            if($productSize && $productSize->stock_quantity >= $item['quantity']) {
                $productSize->stock_quantity -= $item['quantity'];
                $productSize->save();
            }
        }
        
        Mail::to($request->input('email'))->send(new OrderEmail($cart, $order));
 
        session()->forget('cart');
        return view('page.thankyou');
    }
}
