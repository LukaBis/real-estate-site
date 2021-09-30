<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Testemonial extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['text'];
    protected $fillable = ["names"];
}
