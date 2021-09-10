<?php

namespace App\Repositories\Eloquent;

use App\Models\Property;
use App\Repositories\PropertyRepositoryInterface;

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

}
