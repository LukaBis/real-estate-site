<?php

namespace App\Helpers;

class RandomPropertyImage {

    public static function image()
    {
        $allPropertyImages = \File::files('storage/images/property_images');
        $allPropertyImagesFileNames = [];

        foreach ($allPropertyImages as $image) {
          array_push($allPropertyImagesFileNames, pathinfo($image)["filename"]);
        }

        // return random filename from array
        return $allPropertyImagesFileNames[rand(0, count($allPropertyImagesFileNames) - 1)].'.jpg';
    }

}
