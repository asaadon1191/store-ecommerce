<?php

namespace App\Models;

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

// RELATIONS
   public function TAG()
   {
       return $this->hasOne(TagTranslation::class);
   }
}
