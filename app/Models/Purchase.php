<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'supplier',
        'chalan_no',
        'product_name',
        'stock',
        'expiry_date',
        'batch_no',
        'quantity',
        'rate',
        'discount',
        'vat',
        'total',
        'payment_type',
    ];
}
