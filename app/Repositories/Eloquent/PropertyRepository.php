<?php

namespace App\Repositories\Eloquent;

use App\Models\Property;
use App\Models\TypeTranslation;
use App\Models\Amenity;
use App\Models\PropertyHorizontalImage;
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
                           ->when($request->type, function ($query, $type) {

                                       $type_id = TypeTranslation::where([
                                         ['locale', app()->currentLocale()],
                                         ['name', $type]
                                       ])->get('type_id')->toArray()[0]['type_id'];

                                       return $query->where('type_id', $type_id);
                                   })
                           ->when($request->city, function ($query, $city) {
                                       return $query->where("city", $city);
                                   })
                           ->when($request->beds, function ($query, $beds) {
                                       return $query->where("beds", $beds);
                                   })
                           ->when($request->garages, function ($query, $garages) {
                                       return $query->where("garage", $garages);
                                   })
                           ->when($request->bathrooms, function ($query, $baths) {
                                       return $query->where("baths", $baths);
                                   })
                           ->when($request->minPrice, function ($query, $price) {
                                       return $query->where("price", '>', $price);
                                   })
                           ->paginate($per_pages);

         $properties->appends([
           'status'    => $request->status,
           'type'      => $request->type,
           'city'      => $request->city,
           'beds'      => $request->beds,
           'garages'   => $request->garages,
           'bathrooms' => $request->bathrooms,
           'minPrice'  => $request->minPrice
         ]);

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

    public function updateProperty($propertyId, $propertyData, $amenityIds): void
    {
        $this->model->find($propertyId)->update($propertyData);

        // add new amenity if neccessary
        foreach ($amenityIds as $amenityId) {
          if (!$this->model->find($propertyId)->hasThisAmenity(Amenity::find($amenityId))) {
            $this->model->find($propertyId)->amenities()->attach($amenityId);
          }
        }

        // remove amenities if neccessary
        $propertyAmenities = array_column(
          $this->model->find($propertyId)->amenities()->get(['amenity_id'])->toArray(),
          "amenity_id"
        );

        foreach ($propertyAmenities as $id) {
          if (!in_array($id, $amenityIds)) {
            $this->model->find($propertyId)->amenities()->detach($id);
          }
        }
    }

    public function verticalImageFilename($id): string
    {
        return $this->model->find($id)->vertical_image;
    }

    public function allHorizontalImages($propertyId): array
    {
        $images = PropertyHorizontalImage::where('property_id', $propertyId)->get(["filename", "id"])->toArray();
        return $images;
    }

    public function removeAgent($agentId): void
    {
        $this->model->where("agent_id", $agentId)->update(['agent_id' => null]);
    }
}
