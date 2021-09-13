<?php

namespace App\Helpers;

class RandomPropertyVerticalImage {

    public static function image()
    {
        $allPropertyVerticalImages = \File::files('storage/images/property_images/vertical_images');
        $allPropertyImagesFileNames = [];

        foreach ($allPropertyVerticalImages as $image) {
          array_push($allPropertyImagesFileNames, pathinfo($image)["filename"]);
        }

        // return random filename from array
        return $allPropertyImagesFileNames[rand(0, count($allPropertyImagesFileNames) - 1)].'.jpg';
    }

}
