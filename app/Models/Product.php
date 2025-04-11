<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{   
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'current_stock',
        'minimum_stock',
        'sku_code',
        'category_id',
        'venue_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function providers() {
        return $this->belongsToMany(Provider::class, 'product_providers')
            ->using(ProductProvider::class);
    }

    public function movements()
    {
        return $this->hasMany(Movement::class);
    }
}
