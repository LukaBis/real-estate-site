<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

// This class makes sure that there is enough horizontal images for each property
class NumberOfHorizontalImagesFiles
{
    public static function checkNumberOfFiles($numberOfProperties, $imagesPerProperty)
    {
        $allPropertyHorizontalImages = \File::files('storage/images/property_images/horizontal_images');
        $numberOfImagesInDirectory = count($allPropertyHorizontalImages);

        if ($numberOfImagesInDirectory >= ($numberOfProperties * $imagesPerProperty)) {
            return true;
        }

        return false;
    }
}
