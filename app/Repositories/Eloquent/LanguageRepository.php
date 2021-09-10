<?php

namespace App\Repositories\Eloquent;

use App\Models\Language;
use App\Repositories\LanguageRepositoryInterface;

class LanguageRepository extends BaseRepository implements LanguageRepositoryInterface
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
    public function __construct(Language $model)
    {
        $this->model = $model;
    }
    
}
