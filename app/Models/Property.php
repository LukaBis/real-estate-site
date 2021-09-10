<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Property extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['description'];
    // protected $fillable = [];
    protected $guarded = [];
}
