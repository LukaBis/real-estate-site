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

    public function paginate_all(int $per_pages, array $relations = []): LengthAwarePaginator
    {
        return $this->model->paginate($per_pages);
    }

}
