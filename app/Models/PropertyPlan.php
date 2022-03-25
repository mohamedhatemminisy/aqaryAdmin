<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PropertyPlan extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title'
    ];
    public $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = ['image', 'property_id'];
}
