<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SingleAgentRequest;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;

class DashboardAgentController extends Controller
{
    private $agentRepository;
    private $languageRepository;
    private $propertyRepository;

    public function __construct(
      AgentRepositoryInterface $agentRepository,
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository
    ) {
        $this->agentRepository    = $agentRepository;
        $this->languageRepository = $languageRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function allAgents()
    {
        $agents = $this->agentRepository->all();

        return view('adminpanel.agents',[
          'agents' => $agents
        ]);
    }

    public function singleAgent(SingleAgentRequest $request)
    {
        $agent      = $this->agentRepository->findById($request->id);
        $languages  = $this->languageRepository->all();
        $properties = $this->propertyRepository->all();

        return view('adminpanel.single-agent', [
          "agent"      => $agent,
          "languages"  => $languages,
          "properties" => $properties
        ]);
    }
}
