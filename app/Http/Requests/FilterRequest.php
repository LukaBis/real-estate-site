<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
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
            'filter' => Rule::in($this->propertyRepository->arrayOfAllFilters())
        ];
    }
}
