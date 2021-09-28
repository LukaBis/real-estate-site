<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AgentRepositoryInterface;

class DashboardAgentController extends Controller
{
    private $agentRepository;

    public function __construct(AgentRepositoryInterface $agentRepository)
    {
        $this->agentRepository    = $agentRepository;
    }

    public function allAgents()
    {
        $agents = $this->agentRepository->all();

        return view('adminpanel.agents',[
          'agents'    => $agents
        ]);
    }
}
