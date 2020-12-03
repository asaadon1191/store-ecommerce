<?php

namespace App\Models;

use App\Models\Product;
use App\Models\TagTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Tag extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['translations'];

    protected $table = "tags";
    protected $fillable = 
    [
        'slug'
    ];


// SCOPES

    public function scopeActive($qry)
    {
        return $qry->where('is_active',1);
    }

    public function scopeSelect($qry)
    {
        return $qry->select('id','name');
    }

// RELATIONS

   public function TAG()
   {
       return $this->hasOne(TagTranslation::class);
   }

    //    MANY TO MANY WITH PRODUCT MODEL
   public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
