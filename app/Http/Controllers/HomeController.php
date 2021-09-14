<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\TestemonialRepositoryInterface;
use App\Helpers\ArrayOfAgents;

class HomeController extends Controller
{
    private $languageRepository;
    private $agentRepository;
    private $propertyRepository;
    private $testemonialRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      AgentRepositoryInterface $agentRepository,
      PropertyRepositoryInterface $propertyRepository,
      TestemonialRepositoryInterface $testemonialRepository
      ) {
        $this->languageRepository    = $languageRepository;
        $this->agentRepository       = $agentRepository;
        $this->propertyRepository    = $propertyRepository;
        $this->testemonialRepository = $testemonialRepository;
    }

    public function homePage()
    {
        $languages  = $this->languageRepository->all();
        $properties = $this->propertyRepository->all(
          $columns   = ['*'],
          $relations = ['images']
        );
        $agents       = $this->agentRepository->all();
        $testemonials = $this->testemonialRepository->all();

        // we'll take only 3 properties
        $properties = $properties->slice(0,3);

        // we'll take only 3 agents
        $agents = $agents->slice(0,3);

        return view('home', [
          'languages'    => $languages,
          'properties'   => $properties,
          'agents'       => $agents,
          'testemonials' => $testemonials
        ]);
    }
}
