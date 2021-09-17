<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Http\Requests\FilterRequest;

class PropertyController extends Controller
{
    private $languageRepository;
    private $propertyRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function allProperties(FilterRequest $request)
    {
        $languages  = $this->languageRepository->all();
        $statuses   = $this->propertyRepository->getAllDifferentStatuses();
        $properties = $this->propertyRepository->paginate_filtered_results(
          6,
          $request
        );

        return view('properties', [
          'languages'             => $languages,
          'properties'            => $properties,
          'statuses'              => $statuses,
          'current_status_filter' => $request->status
        ]);
    }

    public function singleProperty(Request $request)
    {
        $languages = $this->languageRepository->all();
        $property  = $this->propertyRepository->findById(
          $request->id,
          ['*'],
          ['images', 'amenities', 'agent']
        );

        return view('single-property', [
          'languages' => $languages,
          'property'  => $property,
        ]);
    }
}
