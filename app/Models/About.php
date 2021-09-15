<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'about';

    public $translatedAttributes = ['title', 'subtitle', 'text'];
}
