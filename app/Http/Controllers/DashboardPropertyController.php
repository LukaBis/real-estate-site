<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\StatusTranslationRepositoryInterface;
use App\Http\Requests\SinglePropertyRequest;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\AmenityRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;

class DashboardPropertyController extends Controller
{
    private $propertyRepository;
    private $statusTranslationRepository;
    private $typeRepository;
    private $agentRepository;
    private $amenityRepository;
    private $languageRepository;

    public function __construct(
      PropertyRepositoryInterface $propertyRepository,
      StatusTranslationRepositoryInterface $statusTranslationRepository,
      TypeRepositoryInterface $typeRepository,
      AgentRepositoryInterface $agentRepository,
      AmenityRepositoryInterface $amenityRepository,
      LanguageRepositoryInterface $languageRepository

    ) {
        $this->propertyRepository          = $propertyRepository;
        $this->statusTranslationRepository = $statusTranslationRepository;
        $this->typeRepository              = $typeRepository;
        $this->agentRepository             = $agentRepository;
        $this->amenityRepository           = $amenityRepository;
        $this->languageRepository          = $languageRepository;
    }

    public function allProperties()
    {
        $properties = $this->propertyRepository->all();

        return view('adminpanel.properties', [
          'properties' => $properties
        ]);
    }

    public function singleProperty(SinglePropertyRequest $request)
    {
        $property = $this->propertyRepository->findById($request->id);
        $statuses = $this->statusTranslationRepository->getAllDifferentStatuses(
          app()->currentLocale()
        );
        $agents    = $this->agentRepository->all();
        $amenities = $this->amenityRepository->all();
        $languages = $this->languageRepository->all();

        return view('adminpanel.single-property', [
          'property'  => $property,
          'statuses'  => $statuses,
          "types"     => $this->typeRepository->all(),
          "agents"    => $agents,
          "amenities" => $amenities,
          "languages" => $languages
        ]);
    }
}
