<?php

namespace App\Repositories\Eloquent;

use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
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
    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

}
