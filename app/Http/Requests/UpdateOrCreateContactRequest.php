<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrCreateContactRequest extends FormRequest
{
    /**
    * Prepare the data for validation.
    *
    * @return void
    */
    protected function prepareForValidation()
    {
        $this->merge([
            'phone' => str_replace(' ', '', $this->phone),
            'house_number' => str_replace(' ', '', $this->house_number)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => "required|email",
            "phone" => "required|numeric|digits_between:4,100",
            "city" => "required|min:1|max:100",
            "street_name" => "required|min:1|max:100",
            "house_number" => "required|numeric|digits_between:1,10"
        ];
    }
}
