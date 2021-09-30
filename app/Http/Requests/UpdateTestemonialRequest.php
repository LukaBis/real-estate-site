<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\TestemonialRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use Illuminate\Validation\Rule;

class UpdateTestemonialRequest extends FormRequest
{
    private $testemonialRepository;
    private $languageRepository;

    public function __construct(
      TestemonialRepositoryInterface $testemonialRepository,
      LanguageRepositoryInterface $languageRepository
    ) {
        $this->testemonialRepository = $testemonialRepository;
        $this->languageRepository    = $languageRepository;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $arrayForValidation = [
          "testemonialId" => [
            "required",
            Rule::in($this->testemonialRepository->allIdsInOneDimensionalArray())
          ],
          "names" => [
            "required",
            "min:2",
            "max:50"
          ]
        ];

        // there is text for each language
        // each testemonial text has key: {languageIso}-text
        $languages = $this->languageRepository->all();

        foreach ($languages as $language) {
          $arrayForValidation[$language->iso."-text"] = [
            "required", "min:10", "max:1000"
          ];
        };

        return $arrayForValidation;
    }
}
