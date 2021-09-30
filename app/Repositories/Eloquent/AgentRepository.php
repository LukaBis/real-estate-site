<?php

namespace App\Repositories\Eloquent;

use App\Models\Agent;
use App\Models\Property;
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

    public function updateAgent($agentId, $agentData, $propertyIds)
    {
        $this->model->find($agentId)->update($agentData);

        // add new property if neccessary
        foreach ($propertyIds as $propertyId) {
          if (!$this->model->find($agentId)->hasThisProperty(Property::find($propertyId))) {
            $this->model->find($agentId)->properties()->save(Property::find($propertyId));
          }
        }

        // remove properties if neccessary
        $agentProperties = array_column(
          $this->model->find($agentId)->properties()->get(['id'])->toArray(),
          "id"
        );

        foreach ($agentProperties as $id) {
          if (!in_array($id, $propertyIds)) {
            $property = Property::find($id);
            $property->agent_id = null;
            $property->save();
          }
        }
    }

    public function image($id): string
    {
        return Agent::find($id)->image;
    }

    public function createAgent($agentData, $choosenPropertyIds): void
    {
        $agent = $this->model->create($agentData);

        foreach ($choosenPropertyIds as $propertyId) {
          Property::find($propertyId)->update(["agent_id" => $agent->id]);
        }
    }
}
