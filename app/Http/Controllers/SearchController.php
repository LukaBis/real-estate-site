<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\StatusTranslationRepositoryInterface;
use App\Repositories\ContactRepositoryInterface;


class SearchController extends Controller
{
    private $propertyRepository;
    private $languageRepository;
    private $typeRepository;
    private $statusTranslationRepository;
    private $contactRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository,
      TypeRepositoryInterface $typeRepository,
      StatusTranslationRepositoryInterface $statusTranslationRepository,
      ContactRepositoryInterface $contactRepository
      ) {
        $this->languageRepository          = $languageRepository;
        $this->propertyRepository          = $propertyRepository;
        $this->typeRepository              = $typeRepository;
        $this->contactRepository           = $contactRepository;
        $this->statusTranslationRepository = $statusTranslationRepository;
    }

    public function search(FilterRequest $request)
    {
        $languages  = $this->languageRepository->all();
        $contact    = $this->contactRepository->all();
        $statuses   = $this->statusTranslationRepository->getAllDifferentStatuses(
          app()->currentLocale()
        );
        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];
        $properties = $this->propertyRepository->paginate_filtered_results(
          6,
          $request
        );

        // dd($properties);
        return view('properties', [
          'current_status_filter' => $request->status,
          'statuses'              => $statuses,
          'languages'             => $languages,
          'filters'               => $filters,
          'properties'            => $properties,
          'contact'               => $contact,
        ]);
    }
}
