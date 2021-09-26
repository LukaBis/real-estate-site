<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GetPropertyVerticalImage {
    public static function image()
    {
        $allPropertyVerticalImages = \File::files('storage/images/property_images/vertical_images');
        $allPropertyImagesFileNames = [];

        foreach ($allPropertyVerticalImages as $image) {
          array_push($allPropertyImagesFileNames, pathinfo($image)["filename"] . '.' . pathinfo($image)["extension"]);
        }

        foreach ($allPropertyImagesFileNames as $filename) {
          if (!(new self)->existsInDatabase($filename)) {
            return $filename;
          }
        }

        return null;
    }

    public function existsInDatabase($filename)
    {
        $n = DB::table('properties')->where("vertical_image", $filename)->count();

        if ($n > 0) {
          return true;
        }

        return false;
    }
}
