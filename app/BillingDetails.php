<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    protected $casts = [
        'product_name' => 'array',
        'quantity' => 'array',
        'price' => 'array',
        'total_price' => 'array',
        'grand_total' => 'array',
    ];
}
