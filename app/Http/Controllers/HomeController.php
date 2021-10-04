<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\TestemonialRepositoryInterface;
use App\Helpers\ArrayOfAgents;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;

class HomeController extends Controller
{
    private $languageRepository;
    private $agentRepository;
    private $propertyRepository;
    private $testemonialRepository;
    private $contactRepository;
    private $typeRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      AgentRepositoryInterface $agentRepository,
      PropertyRepositoryInterface $propertyRepository,
      TestemonialRepositoryInterface $testemonialRepository,
      ContactRepositoryInterface $contactRepository,
      TypeRepositoryInterface $typeRepository
      ) {
        $this->languageRepository    = $languageRepository;
        $this->agentRepository       = $agentRepository;
        $this->propertyRepository    = $propertyRepository;
        $this->testemonialRepository = $testemonialRepository;
        $this->contactRepository     = $contactRepository;
        $this->typeRepository        = $typeRepository;
    }

    public function homePage()
    {
        $languages  = $this->languageRepository->all();
        $contact    = $this->contactRepository->all();
        $properties = $this->propertyRepository->all(
          $columns   = ['*'],
          $relations = ['images']
        );
        $agents       = $this->agentRepository->all();
        $testemonials = $this->testemonialRepository->all();

        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        // we'll take only 3 properties
        $properties = $properties->slice(0,3);

        // we'll take only 3 agents
        $agents = $agents->slice(0,3);

        return view('home', [
          'languages'    => $languages,
          'properties'   => $properties,
          'agents'       => $agents,
          'testemonials' => $testemonials,
          'contact'      => $contact,
          'filters'      => $filters
        ]);
    }
}
