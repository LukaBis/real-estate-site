<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestemonialTranslation extends Model
{
    use HasFactory;

    protected $table = 'testemonial_translations';
    protected $fillable = ["text"];
}
