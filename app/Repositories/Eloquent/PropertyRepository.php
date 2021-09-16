<?php

namespace App\Repositories\Eloquent;

use App\Models\Property;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository extends BaseRepository implements PropertyRepositoryInterface
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
    public function __construct(Property $model)
    {
        $this->model = $model;
    }

    public function paginate_filtered_results(int $per_pages, $request): LengthAwarePaginator
    {
        $properties = $this->model
                           ->when($request->status, function ($query, $status) {
                                       return $query->where('status', $status);
                                   })
                           ->paginate($per_pages);

         $properties->appends(['status' => $request->status]);

         return $properties;
    }

    public function getAllDifferentStatuses(): Collection
    {
        return $this->model->select('status')->distinct()->get();
    }

    public function getAllDifferentStatusesInArray(): array
    {
        $statuses = $this->model->select('status')->distinct()->get()->toArray();
        return array_column($statuses, 'status');
    }

}
