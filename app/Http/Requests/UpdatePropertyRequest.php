<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Repositories\StatusRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AmenityRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;

class UpdatePropertyRequest extends FormRequest
{
    private $statusRepository;
    private $typeRepository;
    private $agentRepository;
    private $languageRepository;
    private $amenityRepository;
    private $propertyRepository;

    public function __construct(
      StatusRepositoryInterface $statusRepository,
      TypeRepositoryInterface $typeRepository,
      AgentRepositoryInterface $agentRepository,
      LanguageRepositoryInterface $languageRepository,
      AmenityRepositoryInterface $amenityRepository,
      PropertyRepositoryInterface $propertyRepository
      ) {
        $this->statusRepository   = $statusRepository;
        $this->typeRepository     = $typeRepository;
        $this->agentRepository    = $agentRepository;
        $this->languageRepository = $languageRepository;
        $this->amenityRepository  = $amenityRepository;
        $this->propertyRepository  = $propertyRepository;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arrayForValidation = [
            "propertyId" =>  [
              "required",
              Rule::in($this->propertyRepository->allIdsInOneDimensionalArray())
            ],
            "street_name" => ["required", "min:2", "max:100"],
            "house_number" => ["required", "min:1", "max:10"],
            "city" => ["required", "min:2"],
            "price" => ["required", "min:1", "max:1000000000", "numeric"],
            "area" => ["required", "numeric", "min:1", "max:1000000000"],
            "beds" => ["required", "numeric", "min:1", "max:1000000000"],
            "baths" => ["required", "numeric", "min:1", "max:1000000000"],
            "garage" => ["required", "numeric", "min:1", "max:1000000000"],
            "rent" => ["required", "min:1", "max:1000000000", "numeric"],
            "status" => [
              "required",
              Rule::in($this->statusRepository->idArray())
            ],
            "type" => [
              "required",
              Rule::in($this->typeRepository->allIdsInOneDimensionalArray())
            ],
            "agent" => [
              "required",
              Rule::in($this->agentRepository->allIdsInOneDimensionalArray())
            ]
        ];

        // there is a desciption for each language
        // descroption keys have type of {lanugageIso}-desciption
        $languages = $this->languageRepository->all();

        foreach ($languages as $language) {
          $arrayForValidation[$language->iso."-description"] = [
            "required", "min:1", "max:1000"
          ];
        };

        // eache amenity has a different name, because of checkbox on frontend
        // name of each amenity has fomrat amenity{amenityId}
        $allAmenityIds = $this->amenityRepository->allIdsInOneDimensionalArray();

        foreach ($allAmenityIds as $id) {
          $arrayForValidation["amenity".$id] = [
            'nullable',
            Rule::in($allAmenityIds)
          ];
        }

        return $arrayForValidation;
    }
}
