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

}
