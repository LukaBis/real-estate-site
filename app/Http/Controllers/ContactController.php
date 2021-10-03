<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;

class ContactController extends Controller
{
    private $contactRepository;
    private $languageRepository;
    private $typeRepository;
    private $propertyRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      ContactRepositoryInterface $contactRepository,
      TypeRepositoryInterface $typeRepository,
      PropertyRepositoryInterface $propertyRepository
      ) {
        $this->contactRepository = $contactRepository;
        $this->languageRepository = $languageRepository;
        $this->typeRepository     = $typeRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function contact()
    {
        $contact    = $this->contactRepository->all();
        $languages  = $this->languageRepository->all();

        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        return view('contact', [
          'contact'   => $contact,
          'languages' => $languages,
          'filters'   => $filters
        ]);
    }
}
