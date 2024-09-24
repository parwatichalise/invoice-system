<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 
        'product_model', 
        'sale_price', 
        'purchase_price', 
        'in_qty', 
        'out_qty', 
        'stock', 
        'stock_sale_price', 
        'stock_purchase_price'
    ];
}
