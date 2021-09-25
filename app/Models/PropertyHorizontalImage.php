<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyHorizontalImage extends Model
{
    use HasFactory;
    protected $table = 'property_horizontal_images';
    protected $fillable = ['property_id', 'filename'];
}
