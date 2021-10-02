<?php

namespace App\Repositories\Eloquent;

use App\Models\About;
use App\Repositories\AboutRepositoryInterface;

class AboutRepository extends BaseRepository implements AboutRepositoryInterface
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
    public function __construct(About $model)
    {
        $this->model = $model;
    }

    public function horizontalImageFilename()
    {
        // there is only one row
        return $this->model->first()->horizontal_image;
    }

    public function verticalImageFilename()
    {
        // there is only one row
        return $this->model->first()->vertical_image;
    }
}
