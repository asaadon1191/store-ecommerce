<?php

namespace App\Models;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable,
        SoftDeletes;

    protected $with = ['translations'];

    
    protected $fillable = [
        'brand_id',
         'slug',
        'sku',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'manage_stock',
        'qty',
        'in_stock',
        'is_active'
    ];

   
    protected $casts = 
    [
        'manage_stock'  => 'boolean',
        'in_stock'      => 'boolean',
        'is_active'     => 'boolean',
    ];

    protected $dates = 
    [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
   /* protected $appends = [
        'base_image', 'formatted_price', 'rating_percent', 'is_in_stock', 'is_out_of_stock',
        'is_new', 'has_percentage_special_price', 'special_price_percent',
    ];*/

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['name', 'description', 'short_description'];

    public function Status()
    {
       return $this->is_active == 1 ? 'Active' : 'Not Active';
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }



    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    // ONE TO MANY WITH PRODUCT IMAGES
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

}