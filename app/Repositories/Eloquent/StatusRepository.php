<?php

namespace App\Repositories\Eloquent;

use App\Models\Status;
use App\Repositories\StatusRepositoryInterface;

class StatusRepository extends BaseRepository implements StatusRepositoryInterface
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
    public function __construct(Status $model)
    {
        $this->model = $model;
    }

    public function idArray(): array
    {
        return array_column($this->model->select('id')->get()->toArray(), 'id');
    }

}
