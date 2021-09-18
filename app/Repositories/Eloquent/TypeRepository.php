<?php

namespace App\Repositories\Eloquent;

use App\Models\Type;
use App\Repositories\TypeRepositoryInterface;

class TypeRepository extends BaseRepository implements TypeRepositoryInterface
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
    public function __construct(Type $model)
    {
        $this->model = $model;
    }

}
