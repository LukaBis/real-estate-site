<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MiniSquareImage implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $file)
    {
        $image = getimagesize($file);

        if (is_array($image)) {
          $width = $image[0];
          $height = $image[1];

          $square = ($height == $width);
          $mini = ($height < 100);

          return ($square && $mini);
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mini image needs to have same width and height and height needs to be less then 100px';
    }
}
