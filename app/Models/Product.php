<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'id',
        'category_id',
        'prd_code',
        'name',
        'price',
        'thumbnail',
        'description',
        'sale_off',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault(['name' => '']);
    }
}
