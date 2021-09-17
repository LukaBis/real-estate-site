<?php

namespace App\Repositories\Eloquent;

use App\Models\StatusTranslation;
use App\Repositories\StatusTranslationRepositoryInterface;
use Illuminate\Support\Collection;

class StatusTranslationRepository implements StatusTranslationRepositoryInterface
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
    public function __construct(StatusTranslation $model)
    {
        $this->model = $model;
    }

    public function getAllDifferentStatuses(string $locale): Collection
    {
        $statuses = $this->model->where('locale', $locale)->get();
        return $statuses;
    }

}
