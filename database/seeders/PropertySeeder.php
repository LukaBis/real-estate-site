<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyHorizontalImage;
use App\Helpers\NumberOfVerticalImagesFiles;
use App\Helpers\NumberOfHorizontalImagesFiles;
use App\Helpers\GetPropertyHorizontalImage;

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
        $horizontalImagesPerProperty = 2;

        // making sure there is one vertical image for each property
        $verticalImagesAreReady = NumberOfVerticalImagesFiles::checkNumberOfFiles($numberOfProperties);
        $horizontalImagesAreReady = NumberOfHorizontalImagesFiles::checkNumberOfFiles($numberOfProperties, $horizontalImagesPerProperty);

        if ($verticalImagesAreReady && $horizontalImagesAreReady) {
          for ($i = 0; $i < $numberOfProperties; $i++) {
            $property = Property::factory()->create();

            // adding horizontal images to each property
            // not using "has" method on factory in order to make sure that each image is unique
            for ($j = 0; $j < $horizontalImagesPerProperty; $j++) {
              PropertyHorizontalImage::create([
                "property_id" => $property->id,
                "filename"    => GetPropertyHorizontalImage::image()
              ]);
            }
          }
        } elseif (!$verticalImagesAreReady) {
          dd('Not enough vertical images in folder vertical_images. Expected '.$numberOfProperties.' images');
        } else {
          dd('Not enough horizontal images in folder horizontal_images. Expected '.($numberOfProperties * $horizontalImagesPerProperty).' images');
        }
    }
}
