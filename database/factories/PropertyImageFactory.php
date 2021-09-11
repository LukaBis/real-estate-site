<?php

namespace Database\Factories;

use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\RandomPropertyImage;

class PropertyImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "filename" => RandomPropertyImage::image()
        ];
    }
}
