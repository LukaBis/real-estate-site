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
        $languages           = $this->languageRepository->all();
        $property_filters    = $this->propertyRepository->getAllDifferentStatuses();
        $properties          = $this->propertyRepository->paginate_all(
          6,
          $relations = ['images'],
          $filter    = $request->filter
        );

        return view('properties', [
          'languages'        => $languages,
          'properties'       => $properties,
          'property_filters' => $property_filters,
          'current_filter'   => $filter
        ]);
    }
}
