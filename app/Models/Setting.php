<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'tbl_setting';
    protected $fillable =  [
        'id',
        'location',
        'hotline',
        'logo',
        'time_active',
        'site_name',
        'site_description',
    ];
}
