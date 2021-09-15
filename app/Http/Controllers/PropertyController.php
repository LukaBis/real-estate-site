<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;

class PropertyController extends Controller
{
    private $languageRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->propertyRepository    = $propertyRepository;
    }

    public function allProperties()
    {
        $languages  = $this->languageRepository->all();
        $properties = $this->propertyRepository->paginate_all(
          6,
          $relations = ['images']
        );

        return view('properties', [
          'languages' => $languages,
          'properties'   => $properties
        ]);
    }
}
