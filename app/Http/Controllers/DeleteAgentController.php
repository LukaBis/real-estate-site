<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\SingleAgentRequest;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class DeleteAgentController extends Controller
{
    private $agentRepository;
    private $propertyRepository;

    public function __construct(
      AgentRepositoryInterface $agentRepository,
      PropertyRepositoryInterface $propertyRepository
    ) {
        $this->agentRepository    = $agentRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function deleteAgent(SingleAgentRequest $request)
    {
        // delete agent's image
        $image = $this->agentRepository->image($request->id);
        Storage::disk('images')->delete('/agent_images/'.$image);

        // set properties.agent_id to null since this agent will no longer exist
        $this->propertyRepository->removeAgent($request->id);

        // delete agent
        $this->agentRepository->deleteById($request->id);

        return redirect('/home/agents')->with('successMessage', 'Deleted successfully');
    }
}
