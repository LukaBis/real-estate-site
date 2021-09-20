<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\StatusRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
{
    private $statusRepository;
    private $typeRepository;
    private $propertyRepository;

    public function __construct(
      StatusRepositoryInterface $statusRepository,
      TypeRepositoryInterface $typeRepository,
      PropertyRepositoryInterface $propertyRepository
      ) {
        $this->statusRepository   = $statusRepository;
        $this->typeRepository     = $typeRepository;
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
         if ($this->status == "All") $this->merge([ 'status' => null ]);
         if ($this->type == "Any") $this->merge([ 'type' => null ]);
         if ($this->city == "Any") $this->merge([ 'city' => null ]);
         if ($this->beds == "Any") $this->merge([ 'beds' => null ]);
         if ($this->garages == "Any") $this->merge([ 'garages' => null ]);
         if ($this->bathrooms == "Any") $this->merge([ 'bathrooms' => null ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => [
              Rule::in($this->statusRepository->idArray()),
              'nullable'
            ],
            'type' => [
              Rule::in($this->typeRepository->allTypesInArray()),
              'nullable'
            ],
            'city' => [
              Rule::in($this->propertyRepository->allCities()),
              'nullable'
            ],
            'beds' => [
              Rule::in($this->propertyRepository->allBedsNumbers()),
              'nullable'
            ],
            'garages' => [
              Rule::in($this->propertyRepository->allGarageNumbers()),
              'nullable'
            ],
            'bathrooms' => [
              Rule::in($this->propertyRepository->allBathsNumbers()),
              'nullable'
            ],
            'minPrice' => [
              'min:1',
              'max:1000000000',
              'numeric',
              'nullable'
            ]
        ];
    }
}
