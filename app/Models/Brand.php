<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\BrandTranslation;


class Brand extends Model
{
    // USE TRANSLATION PACKAGE
    use Translatable;

    protected $with = ['translations'];

    // TO KNOW WITCH COLUMN IS WILL TRANSLATE IN CATEGORY TRANSLATION TABLE

    protected $translatedAttributes = ['name'];

    // CALL TABLE NAME AND COLUMNS
    protected $table = "brands";
    protected $fillable = 
    [
        'photo','is_active'
    ];

    // TO MAKE TRANSLATABLE DATE UNRETURN WITH DATE AS ADEFULT
    protected $hidden = ['translations'];

    //TO MAKE ACTIVE VALUE == TRUE OR FALSE 
    protected $casts = ['is_active' => 'boolean'];


    //SCOPES
    

    public function Status()
    {
       return $this->is_active == 1 ? 'Active' : 'Not Active';
    }

    // RELATIONS
     public function BRAND()
     {
         return $this->hasOne(BrandTranslation::class);
     }
}
