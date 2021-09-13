<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Helpers\ArrayOfAgents;

class HomeController extends Controller
{
    private $languageRepository;
    private $agentRepository;
    private $propertyRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      AgentRepositoryInterface $agentRepository,
      PropertyRepositoryInterface $propertyRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->agentRepository = $agentRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function homePage()
    {
        $languages = $this->languageRepository->all();
        $properties = $this->propertyRepository->all(
          $columns = ['*'],
          $relations = ['images']
        );

        // we'll take only 3 properties
        $properties = $properties->slice(0,3);

        return view('home', [
          'languages' => $languages,
          'properties' => $properties
        ]);
    }
}
