<?php

namespace App\Repositories\Eloquent;

use App\Models\Agent;
use App\Repositories\AgentRepositoryInterface;

class AgentRepository extends BaseRepository implements AgentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Agent $model)
    {
        $this->model = $model;
    }

    public function randomId(): int
    {
        $allAgentIds = $this->model->get(['id']);
        $numberOfAgents = $allAgentIds->count();

        return $allAgentIds[rand(1, $numberOfAgents - 1)]->id;
    }

}
