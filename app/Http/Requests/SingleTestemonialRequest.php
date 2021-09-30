<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\TestemonialRepositoryInterface;
use Illuminate\Validation\Rule;

class SingleTestemonialRequest extends FormRequest
{
    private $testemonialRepository;

    public function __construct(TestemonialRepositoryInterface $testemonialRepository)
    {
        $this->testemonialRepository = $testemonialRepository;
    }

    /**
    * Prepare the data for validation.
    *
    * @return void
    */
    protected function prepareForValidation()
    {
        $this->merge([
            'id' => (int)$this->id,
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
            "id" => [
              "required",
              Rule::in($this->testemonialRepository->allIdsInOneDimensionalArray())
            ]
        ];
    }
}
