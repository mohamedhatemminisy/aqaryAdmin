<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyTranslation extends Model
{
    protected $fillable = [
        'title',
        'address',
        'description'
    ];
}
