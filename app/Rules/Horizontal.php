<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Horizontal implements Rule
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
         $width = $image[0];
         $height = $image[1];

         return ($width > $height);
     }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must have horizontal dimensions.';
    }
}
