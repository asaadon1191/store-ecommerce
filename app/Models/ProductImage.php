<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = "product_images";
    protected $fillable = 
    [
        'photo','product_id'
    ];

    // RELATIONS
        // ONE TO MANY WITH PRODUCTS
        public function product()
        {
            return $this->belongsTo(Product::class);
        }
}
