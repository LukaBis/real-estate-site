<?php

namespace App\Repositories\Eloquent;

use App\Models\Testemonial;
use App\Repositories\TestemonialRepositoryInterface;

class TestemonialRepository extends BaseRepository implements TestemonialRepositoryInterface
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
    public function __construct(Testemonial $model)
    {
        $this->model = $model;
    }

    public function BigImageFilename($id)
    {
        return $this->model->find($id)->image_filename;
    }

    public function MiniImageFilename($id)
    {
        return $this->model->find($id)->mini_image_filename;
    }
}
