<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PropertyDetail extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'value'
    ];
    public $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = ['property_id'];
}
