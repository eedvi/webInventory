<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','contact', 'email', 'phone', 'address'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(ProductProvider::class);
    }
}
