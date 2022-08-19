<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'product_name','product_code','buying_price','selling_price','product_quantity'
    ];

    
}
