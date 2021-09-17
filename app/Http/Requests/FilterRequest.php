<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\StatusRepositoryInterface;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest
{
    private $statusRepository;

    public function __construct(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
         if ($this->status == "All") $this->merge([ 'status' => null ]);
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
            ]
        ];
    }
}
