<?php

namespace App\Repositories\Eloquent;

use App\Models\PropertyImage;
use App\Repositories\PropertyImageRepositoryInterface;

class PropertyImageRepository extends BaseRepository implements PropertyImageRepositoryInterface
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
    public function __construct(PropertyImage $model)
    {
        $this->model = $model;
    }

}
