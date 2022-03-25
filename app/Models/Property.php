<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Property extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'address',
        'description'
    ];

    public $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = ['main_image', 'location', 'video', 'phone', 'price', 'email', 'category_id','featured'];

    public function detail(){
        return $this->hasMany(PropertyDetail::class , 'property_id');
    }

    public function feature(){
        return $this->hasMany(PropertyFeature::class , 'property_id');
    }

    public function plan(){
        return $this->hasMany(PropertyPlan::class , 'property_id');
    }

    public function images(){
        return $this->hasMany(PropertyImage::class , 'property_id');
    }

    public function catrgory(){
        return $this->belongsTo(Category::class , 'category_id');
    }

}
