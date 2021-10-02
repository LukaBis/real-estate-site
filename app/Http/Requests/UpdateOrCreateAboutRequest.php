<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AboutRepositoryInterface;
use App\Rules\Horizontal;
use App\Rules\Vertical;

class UpdateOrCreateAboutRequest extends FormRequest
{
    private $languageRepository;
    private $aboutRepository;

    public function __construct(
      AboutRepositoryInterface $aboutRepository,
      LanguageRepositoryInterface $languageRepository
    ) {
        $this->aboutRepository    = $aboutRepository;
        $this->languageRepository = $languageRepository;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // there is a title for each language
        // title keys have type of {lanugageIso}-title
        $languages = $this->languageRepository->all();

        foreach ($languages as $language) {
          $arrayForValidation[$language->iso."-title"] = [
            "required", "min:10", "max:80"
          ];
        };

        // there is a subtitle for each language
        // subtitle keys have type of {lanugageIso}-subtitle
        foreach ($languages as $language) {
          $arrayForValidation[$language->iso."-subtitle"] = [
            "required", "min:10", "max:100"
          ];
        };

        // there is a text for each language
        // text keys have type of {lanugageIso}-text
        foreach ($languages as $language) {
          $arrayForValidation[$language->iso."-text"] = [
            "required", "min:100", "max:600"
          ];
        };

        $arrayForValidation["horizontal-image"] = [
          new Horizontal
        ];

        $arrayForValidation["vertical-image"] = [
          new Vertical
        ];

        return $arrayForValidation;
    }
}
