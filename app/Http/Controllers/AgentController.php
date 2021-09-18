<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;

class AgentController extends Controller
{
    private $languageRepository;
    private $agentRepository;

    public function __construct(
        LanguageRepositoryInterface $languageRepository,
        AgentRepositoryInterface $agentRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->agentRepository    = $agentRepository;
    }

    public function allAgents()
    {
        $languages  = $this->languageRepository->all();
        $agents     = $this->agentRepository->paginated_results(3);

        return view('agents',[
          'languages' => $languages,
          'agents'    => $agents
        ]);
    }
}
