<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTranslation extends Model
{
    use HasFactory;

    protected $table = 'property_translations';
    protected $fillable = ['description', 'locale'];
}
