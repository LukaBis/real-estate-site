<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Vertical;
use App\Repositories\AgentRepositoryInterface;

class UpdateAgentImageRequest extends FormRequest
{
    private $agentRepository;

    public function __construct(AgentRepositoryInterface $agentRepository)
    {
        $this->agentRepository = $agentRepository;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "agentId" => [
              "required",
              Rule::in($this->agentRepository->allIdsInOneDimensionalArray())
            ],
            "image" => [
              "required",
              "image",
              new Vertical
            ]
        ];
    }
}
