<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageTranslation extends Model
{
    use HasFactory;

    protected $table = 'language_translations';

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
