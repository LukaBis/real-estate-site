<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Validation\Rule;

class DeletePropertyRequest extends FormRequest
{
    private $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          "id" =>  [
            "required",
            Rule::in($this->propertyRepository->allIdsInOneDimensionalArray())
          ]
      ];
    }
}
