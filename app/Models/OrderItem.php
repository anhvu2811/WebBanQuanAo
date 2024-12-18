<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_item';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'size_id',
        'quantity',
        'price'
    ];
}
