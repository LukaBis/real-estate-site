<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Vertical implements Rule
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
     * @param  mixed  $file
     * @return bool
     */
    public function passes($attribute, $file)
    {
        $image = getimagesize($file);

        if (is_array($image)) {
          $width = $image[0];
          $height = $image[1];

          return ($width < $height);
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
        return 'The :attribute must have vertical dimensions.';
    }
}
