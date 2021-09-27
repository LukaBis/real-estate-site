<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePropertyRequest;
use App\Repositories\AmenityRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;

class UpdatePropertyController extends Controller
{
    private $languageRepository;
    private $amenityRepository;
    private $propertyRepository;

    public function __construct(
      PropertyRepositoryInterface $propertyRepository,
      AmenityRepositoryInterface $amenityRepository,
      LanguageRepositoryInterface $languageRepository
    ) {
        $this->propertyRepository = $propertyRepository;
        $this->amenityRepository  = $amenityRepository;
        $this->languageRepository = $languageRepository;
    }

    public function updateProperty(UpdatePropertyRequest $request)
    {
        $propertyData = [
          "street_name" => $request->street_name,
          "house_number" => $request->house_number,
          "city" => $request->city,
          "price" => $request->price,
          "area" => $request->area,
          "beds" => $request->beds,
          "baths" => $request->baths,
          "garage" => $request->garage,
          "rent" => $request->rent,
          "status_id" => $request->status,
          "type_id" => $request->type,
          "agent_id" => $request->agent
        ];

        $languages = $this->languageRepository->all();
        // adding description translations
        foreach ($languages as $language) {
          $propertyData[$language->iso] = [
            "description" => $request[$language->iso."-description"]
          ];
        };

        // array of amenity ids
        $choosenAmenityIds = [];
        $allAmenityIds = $this->amenityRepository->allIdsInOneDimensionalArray();

        foreach ($allAmenityIds as $amenityId) {
          if ($request["amenity".$amenityId] != null) {
            array_push($choosenAmenityIds, $amenityId);
          }
        }

        $this->propertyRepository->updateProperty(
          $request->propertyId,
          $propertyData,
          $choosenAmenityIds
        );

        return redirect()->back()->with('successMessage', 'Updated successfully');
    }
}
