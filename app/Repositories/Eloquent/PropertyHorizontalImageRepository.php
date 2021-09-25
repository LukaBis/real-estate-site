<?php

namespace App\Repositories\Eloquent;

use App\Models\PropertyHorizontalImage;
use App\Repositories\PropertyHorizontalImageRepositoryInterface;

class PropertyHorizontalImageRepository extends BaseRepository implements PropertyHorizontalImageRepositoryInterface
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
    public function __construct(PropertyHorizontalImage $model)
    {
        $this->model = $model;
    }

    public function getFilename($id)
    {
        return $this->model->find($id)->filename;
    }

}
