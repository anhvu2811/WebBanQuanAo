<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trending extends Model
{
    use HasFactory;
    protected $table = 'tbl_trending';
    protected $fillable =  [
        'id',
        'product_id',
        'rank',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
