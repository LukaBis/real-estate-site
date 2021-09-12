<?php

namespace App\Repositories\Eloquent;

use App\Models\Amenity;
use App\Repositories\AmenityRepositoryInterface;

class AmenityRepository extends BaseRepository implements AmenityRepositoryInterface
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
    public function __construct(Amenity $model)
    {
        $this->model = $model;
    }

}
