<?php

namespace Database\Factories;

use App\Models\PropertyHorizontalImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\GetPropertyHorizontalImage;

class PropertyHorizontalImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyHorizontalImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "filename" => GetPropertyHorizontalImage::image()
        ];
    }
}
