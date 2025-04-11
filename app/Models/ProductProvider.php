<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductProvider extends Pivot
{

        protected $table = 'product_providers';
        public $incrementing = false;
        protected $fillable = ['product_id', 'provider_id'];
    
}
