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

}
