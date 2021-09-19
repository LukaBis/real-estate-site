<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\StatusTranslationRepositoryInterface;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\SinglePropertyRequest;
use App\Repositories\ContactRepositoryInterface;

class PropertyController extends Controller
{
    private $languageRepository;
    private $propertyRepository;
    private $statusTranslationRepository;
    private $contactRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository,
      StatusTranslationRepositoryInterface $statusTranslationRepository,
      ContactRepositoryInterface $contactRepository
      ) {
        $this->languageRepository          = $languageRepository;
        $this->propertyRepository          = $propertyRepository;
        $this->statusTranslationRepository = $statusTranslationRepository;
        $this->contactRepository           = $contactRepository;
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

        return view('properties', [
          'languages'             => $languages,
          'properties'            => $properties,
          'statuses'              => $statuses,
          'current_status_filter' => $request->status,
          'contact'               => $contact[0]
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

        return view('single-property', [
          'languages' => $languages,
          'property'  => $property,
          'contact'   => $contact[0]
        ]);
    }
}
