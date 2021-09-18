<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\AgentRepositoryInterface;
use Illuminate\Validation\Rule;

class SingleAgentRequest extends FormRequest
{
    private $agentRepository;

    public function __construct(AgentRepositoryInterface $agentRepository)
    {
        $this->agentRepository = $agentRepository;
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
            'id' => [
              'required',
              Rule::in($this->agentRepository->allIdsInOneDimensionalArray())
            ]
        ];
    }
}
