<?php

namespace App\Repositories\Eloquent;

use App\Models\Property;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

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
                                       return $query->whereHas('statusProperty', function(Builder $query) use($status)  {
                                         $query->where('status_id', $status);
                                       });
                                   })
                           ->paginate($per_pages);

         $properties->appends(['status' => $request->status]);

         return $properties;
    }

}
