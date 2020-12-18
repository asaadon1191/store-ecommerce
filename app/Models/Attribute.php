<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Attribute extends Model
{
    use Translatable;
    protected $table = "attributes";

    protected $with = ['translations'];
    protected $translatedAttributes = ['name','locale'];
}
