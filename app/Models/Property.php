<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\PropertyHorizontalImage;
use App\Models\Amenity;
use App\Models\Agent;
use App\Models\Status;
use App\Models\PropertyStatus;

class Property extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['description'];
    // protected $fillable = [];
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(PropertyHorizontalImage::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
