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
                                       return $query->where("status_id", $status);
                                   })
                           ->paginate($per_pages);

         $properties->appends(['status' => $request->status]);

         return $properties;
    }

    public function allCities(): array
    {
        return array_column($this->model->get('city')->toArray(), 'city');
    }

    // this returns all different values of beds columnm on properties table
    public function allBedsNumbers(): array
    {
        $arr = array_column($this->model->distinct()->get('beds')->toArray(), 'beds');
        sort($arr);
        return $arr;
    }

    // this returns all different values of garage columnm on properties table
    public function allGarageNumbers(): array
    {
        $arr = array_column($this->model->distinct()->get('garage')->toArray(), 'garage');
        sort($arr);
        return $arr;
    }

    // this returns all different values of baths columnm on properties table
    public function allBathsNumbers(): array
    {
        $arr = array_column($this->model->distinct()->get('baths')->toArray(), 'baths');
        sort($arr);
        return $arr;
    }

}
