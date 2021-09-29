<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Vertical;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;

class AddNewAgentRequest extends FormRequest
{
    private $languageRepository;
    private $propertyRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository
    ) {
        $this->languageRepository  = $languageRepository;
        $this->propertyRepository  = $propertyRepository;
    }

    /**
    * Prepare the data for validation.
    *
    * @return void
    */
    protected function prepareForValidation()
    {
      $this->merge([
          'phone' => str_replace(' ', '', $this->phone)
      ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validationArray = [
          "full_name" => ["required", "min:1", "max:50"],
          "phone" => ["required", "numeric", "digits_between:1,25"],
          "email" => ["required", "email"]
        ];

        // there is a desciption for each language
        // descroption keys have type of {lanugageIso}-desciption
        $languages = $this->languageRepository->all();

        foreach ($languages as $language) {
          $validationArray[$language->iso."-description"] = [
            "required", "min:1", "max:1000"
          ];
        };

        // each property has a different name, because of checkbox on frontend
        // name of each property has fomrat property{propertyId}
        $allPropertyIds = $this->propertyRepository->allIdsInOneDimensionalArray();

        foreach ($allPropertyIds as $id) {
          $validationArray["property".$id] = [
            'nullable',
            Rule::in($allPropertyIds)
          ];
        }

        $validationArray["image"] = ["required", "image", new Vertical];

        return $validationArray;
    }
}
