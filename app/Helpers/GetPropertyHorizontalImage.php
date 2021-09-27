<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GetPropertyHorizontalImage {
    public static function image()
    {
        $allPropertyHorizontalImages = \File::files('storage/images/property_images/horizontal_images');
        $allPropertyImagesFileNames = [];

        foreach ($allPropertyHorizontalImages as $image) {
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
        $n = DB::table('property_horizontal_images')->where("filename", $filename)->count();

        if ($n > 0) {
          return true;
        }

        return false;
    }
}
