<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\StatusTranslationRepositoryInterface;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\SinglePropertyRequest;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;

class PropertyController extends Controller
{
    private $languageRepository;
    private $propertyRepository;
    private $statusTranslationRepository;
    private $contactRepository;
    private $typeRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository,
      StatusTranslationRepositoryInterface $statusTranslationRepository,
      ContactRepositoryInterface $contactRepository,
      TypeRepositoryInterface $typeRepository
      ) {
        $this->languageRepository          = $languageRepository;
        $this->propertyRepository          = $propertyRepository;
        $this->statusTranslationRepository = $statusTranslationRepository;
        $this->contactRepository           = $contactRepository;
        $this->typeRepository              = $typeRepository;
    }

    public function allProperties(FilterRequest $request)
    {
        $languages  = $this->languageRepository->all();
        $contact    = $this->contactRepository->all();
        $statuses   = $this->statusTranslationRepository->getAllDifferentStatuses(
          app()->currentLocale()
        );
        $properties = $this->propertyRepository->paginate_filtered_results(
          6,
          $request
        );

        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        return view('properties', [
          'languages'             => $languages,
          'properties'            => $properties,
          'statuses'              => $statuses,
          'current_status_filter' => $request->status,
          'contact'               => $contact,
          'filters'               => $filters
        ]);
    }

    public function singleProperty(SinglePropertyRequest $request)
    {
        $languages = $this->languageRepository->all();
        $contact   = $this->contactRepository->all();
        $property  = $this->propertyRepository->findById(
          $request->id,
          ['*'],
          ['images', 'amenities', 'agent', 'status']
        );

        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        return view('single-property', [
          'languages' => $languages,
          'property'  => $property,
          'contact'   => $contact,
          'filters'   => $filters
        ]);
    }
}
