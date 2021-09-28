<?php

namespace App\Repositories\Eloquent;

use App\Models\AmenityProperty;
use App\Repositories\AmenityPropertyRepositoryInterface;

class AmenityPropertyRepository extends BaseRepository implements AmenityPropertyRepositoryInterface
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
    public function __construct(AmenityProperty $model)
    {
        $this->model = $model;
    }

}
