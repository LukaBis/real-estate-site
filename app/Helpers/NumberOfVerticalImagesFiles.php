<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

// This class makes sure that there is one vertical image for each property
class NumberOfVerticalImagesFiles
{
    public static function checkNumberOfFiles($numberOfProperties)
    {
        $allPropertyVerticalImages = \File::files('storage/images/property_images/vertical_images');
        $numberOfImagesInDirectory = count($allPropertyVerticalImages);

        if ($numberOfImagesInDirectory >= $numberOfProperties) {
            return true;
        }

        return false;
    }

}
