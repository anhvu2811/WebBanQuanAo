<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'tbl_category';
    protected $fillable =  [
        'id',
        'category_name',
        'category_description',
    ];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
