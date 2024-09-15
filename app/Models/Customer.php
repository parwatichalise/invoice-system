<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'mobile_no',
        'vat_no',
        'cr_no',
        'address1',
        'address2',
        'fax',
        'city',
        'state',
        'country',
        'zip_code',
    ];
}
