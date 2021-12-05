<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Property;

class Agent extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['about'];
    protected $fillable = ['full_name', 'phone', 'email', 'image'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function hasThisProperty(Property $property)
    {
        $relatedPropertyIds = array_column($this->properties()->get(['id'])->toArray(), 'id');

        if ( in_array($property->id, $relatedPropertyIds) ) {
          return true;
        }

        return false;
    }

    public function shortAbout()
    {
        if (strlen($this->about) >= 90) {
          return substr($this->about, 0, 90);
        } else {
          return $this->about;
        }
    }
}
