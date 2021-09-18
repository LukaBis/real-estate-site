<?php

namespace App\Repositories\Eloquent;

use App\Models\Agent;
use App\Repositories\AgentRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function paginated_results(int $per_pages): LengthAwarePaginator
    {
        return $this->model->paginate($per_pages);
    }

}
