<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Validation\Rule;

class UpdateAgentRequest extends FormRequest
{
    private $languageRepository;
    private $agentRepository;
    private $propertyRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      AgentRepositoryInterface $agentRepository,
      PropertyRepositoryInterface $propertyRepository
    ) {
        $this->languageRepository  = $languageRepository;
        $this->agentRepository     = $agentRepository;
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
          "agentId" => [
            "required",
            Rule::in($this->agentRepository->allIdsInOneDimensionalArray())
          ],
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

        // eache property has a different name, because of checkbox on frontend
        // name of each property has fomrat property{propertyId}
        $allPropertyIds = $this->propertyRepository->allIdsInOneDimensionalArray();

        foreach ($allPropertyIds as $id) {
          $validationArray["property".$id] = [
            'nullable',
            Rule::in($allPropertyIds)
          ];
        }

        return $validationArray;
    }
}
