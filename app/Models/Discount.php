<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'tbl_discount';
    protected $fillable =  [
        'id',
        'product_id',
        'discount_level',
        'new_price',
    ];
}
