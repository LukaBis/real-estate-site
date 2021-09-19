<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;


class SearchController extends Controller
{
    private $propertyRepository;
    private $languageRepository;
    private $typeRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository,
      TypeRepositoryInterface $typeRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->propertyRepository = $propertyRepository;
        $this->typeRepository     = $typeRepository;
    }

    public function search(FilterRequest $request)
    {
        $languages  = $this->languageRepository->all();
        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        return "Good ".$request->minPrice;
        // return view('properties', [
        //   'languages'  => $languages,
        //   'properties' => $properties
        // ]);
    }
}
