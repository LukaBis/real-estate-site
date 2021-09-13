<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyHorizontalImage;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory()
                ->has(PropertyHorizontalImage::factory()->count(3), 'images')
                ->count(10)
                ->create();
    }
}
