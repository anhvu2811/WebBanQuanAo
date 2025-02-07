<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class OrderEmail extends Mailable
{
    public $cart;
    public $order;

    public function __construct($cart, $order)
    {
        $this->cart = $cart;
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('ĐƠN HÀNG WINEHOUSE')
                    ->view('emails.order-email')
                    ->with([
                        'cart' => $this->cart,
                        'order' => $this->order
                    ]);
    }
}
