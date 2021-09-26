<?php

namespace App\Helpers;

class RandomPropertyHorizontalImage
{
    public static function image()
    {
        $allPropertyHorizontalImages = \File::files('storage/images/property_images/horizontal_images');
        $allPropertyImagesFileNames = [];

        foreach ($allPropertyHorizontalImages as $image) {
          array_push($allPropertyImagesFileNames, pathinfo($image)["filename"]);
        }

        // return random filename from array
        return $allPropertyImagesFileNames[rand(0, count($allPropertyImagesFileNames) - 1)].'.jpg';
    }

}
