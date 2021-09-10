<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\ArrayOfAgents;
use App\Repositories\AgentRepositoryInterface;

class AgentSeeder extends Seeder
{
    private $agentRepository;

    public function __construct(AgentRepositoryInterface $agentRepository)
    {
        $this->agentRepository = $agentRepository;
    }

    public function run()
    {

        $agents = ArrayOfAgents::getArray();

        foreach ($agents as $agent) {
          $this->agentRepository->create($agent);
        }

    }
}
