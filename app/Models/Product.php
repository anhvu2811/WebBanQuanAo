<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $fillable =  [
        'id',
        'name',
        'description',
        'material',
        'price',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class)->where('is_main', true);
    }

    public function productSize() {
        return $this->hasMany(ProductSize::class);
    }
    
    public function trending() {
        return $this->belongsTo(Trending::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class);
    }
}
