<?php

namespace App\Repositories\Eloquent;

use App\Models\Property;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository extends BaseRepository implements PropertyRepositoryInterface
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
    public function __construct(Property $model)
    {
        $this->model = $model;
    }

    public function paginate_all(int $per_pages, array $relations = [], $filter = null): LengthAwarePaginator
    {
        if ($filter == 'All' || $filter == null) {
          return $this->model->paginate($per_pages);
        } else {
          $properties = $this->model->where('status', $filter)->paginate($per_pages);
          $properties->appends(['filter' => $filter]);

          return $properties;
        }
    }

    public function getAllDifferentStatuses(): Collection
    {
        return $this->model->select('status')->distinct()->get();
    }

    public function arrayOfAllFilters(): array
    {
        $statuses = $this->model->select('status')->distinct()->get()->toArray();
        $statuses = array_column($statuses, 'status');
        array_push($statuses, null);
        array_push($statuses, 'All');

        return $statuses;
    }

}
