<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $fillable = 
    [
        'key','is_translatable','plain_value'
    ];

    // TO KNOW WITCH COLUMN IS WILL TRANSLATE IN SETTING TRANSLATION TABLE

    protected $translatedAttributes = ['value'];

    // TO CHANGE IS TRANSLATABLE TYPE VALUE FROM [0,1] TO [TRUE,FALSE]

    protected $casts = 
    [
        'is_translatable' => 'boolean',
    ];
// #############################################################################################
    // THIS FUNCTION CALL HERE TO MAKE SEED DATA IN DATA BASE BY FORLOOP IN [SET MANY ARRAY]
    
    public static function setMany($settings)
    {
        foreach ($settings as $key => $value) 
        {
            self::set($key,$value);
        }
    }

    
    public static function set($key, $value)
    {
        if ($key === 'translatable') 
        {
           return static::setTranslatablesettings($value);
        }

        if (is_array($value)) 
        {
            $value = \json_encode($value);
        }

        static::updateOrCreate(['key' => $key],['plain_value' => $value]);
    }



    public static function setTranslatablesettings($settings = [])
    {
        foreach ($settings as $key => $value) 
        {
            static::updateOrCreate(['key' => $key],['is_translatable' => true,'value' => $value]);
        }
    }
}
