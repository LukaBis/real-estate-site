<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\PropertyHorizontalImageRepositoryInterface;
use Illuminate\Validation\Rule;

class DeleteHorizontalImageRequest extends FormRequest
{
    private $horizontalImageRepository;

    public function __construct(PropertyHorizontalImageRepositoryInterface $horizontalImageRepository)
    {
        $this->horizontalImageRepository = $horizontalImageRepository;
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
              Rule::in($this->horizontalImageRepository->allIdsInOneDimensionalArray())
            ]
        ];
    }
}
