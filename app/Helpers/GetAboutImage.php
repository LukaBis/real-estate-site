<?php

namespace App\Helpers;

class GetAboutImage
{
    public static function horizontal()
    {
        $image = \File::files('storage/images/about_images/horizontal');
        $filename = pathinfo($image[0])["filename"] . '.' . pathinfo($image[0])["extension"];

        return $filename;
    }

    public static function vertical()
    {
        $image = \File::files('storage/images/about_images/vertical');
        $filename = pathinfo($image[0])["filename"] . '.' . pathinfo($image[0])["extension"];

        return $filename;
    }
}
