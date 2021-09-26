<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyHorizontalImage;
use App\Helpers\NumberOfVerticalImagesFiles;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfProperties = 10;

        // making sure there is one vertical image for each property
        $imageFilesAreReady = NumberOfVerticalImagesFiles::checkNumberOfFiles($numberOfProperties);

        if ($imageFilesAreReady) {
          for ($i = 0; $i < $numberOfProperties; $i++) {
            Property::factory()
                    ->has(PropertyHorizontalImage::factory()->count(3), 'images')
                    ->create();
          }
        } else {
          dd('Not enough vertical images in folder vertical_images. Expected '.$numberOfProperties.' images');
        }
    }
}
