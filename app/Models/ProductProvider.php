<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model
{
    protected $fillable = [
        'product_id',
        'provider_id'
    ];
    
    // If you want timestamps on the pivot table
    public $timestamps = true;
}
