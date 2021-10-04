<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Http\Requests\SingleAgentRequest;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;

class AgentController extends Controller
{
    private $languageRepository;
    private $agentRepository;
    private $contactRepository;
    private $typeRepository;
    private $propertyRepository;

    public function __construct(
        LanguageRepositoryInterface $languageRepository,
        AgentRepositoryInterface $agentRepository,
        ContactRepositoryInterface $contactRepository,
        TypeRepositoryInterface $typeRepository,
        PropertyRepositoryInterface $propertyRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->agentRepository    = $agentRepository;
        $this->contactRepository  = $contactRepository;
        $this->typeRepository     = $typeRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function allAgents()
    {
        $languages  = $this->languageRepository->all();
        $agents     = $this->agentRepository->paginated_results(3);
        $contact    = $this->contactRepository->all();

        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        return view('agents',[
          'languages' => $languages,
          'agents'    => $agents,
          'contact'   => $contact,
          'filters'   => $filters
        ]);
    }

    public function singleAgent(SingleAgentRequest $request)
    {
        $languages  = $this->languageRepository->all();
        $contact    = $this->contactRepository->all();
        $agent      = $this->agentRepository->findById(
          $request->id,
          ['*'],
          ['properties']
        );

        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        return view('single-agent',[
          'languages' => $languages,
          'agent'     => $agent,
          'contact'   => $contact,
          'filters'   => $filters
        ]);
    }
}
