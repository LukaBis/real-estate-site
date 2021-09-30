<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\TestemonialRepositoryInterface;
use Illuminate\Validation\Rule;
use App\Rules\Horizontal;

class UpdateTestemonialBigImageRequest extends FormRequest
{
    private $testemonialRepository;

    public function __construct(TestemonialRepositoryInterface $testemonialRepository)
    {
        $this->testemonialRepository = $testemonialRepository;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "testemonialId" => [
              "required",
              Rule::in($this->testemonialRepository->allIdsInOneDimensionalArray())
            ],
            "big-image" => [
              "required",
              "image",
              new Horizontal
            ]
        ];
    }
}
