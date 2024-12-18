<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'tbl_order';
    protected $fillable = [
        'id',
        'order_date',
        'customer_name',
        'total_price',
        'coupon_code',
        'payment_method',
        'payment_status',
        'shipping_address',
        'notes',
    ];
}
