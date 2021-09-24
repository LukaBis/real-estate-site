<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePropertyRequest;
use App\Http\Requests\DeletePropertyRequest;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\StatusTranslationRepositoryInterface;
use App\Http\Requests\SinglePropertyRequest;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\AmenityRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;

class DashboardPropertyController extends Controller
{
    private $propertyRepository;
    private $statusTranslationRepository;
    private $typeRepository;
    private $agentRepository;
    private $amenityRepository;
    private $languageRepository;

    public function __construct(
      PropertyRepositoryInterface $propertyRepository,
      StatusTranslationRepositoryInterface $statusTranslationRepository,
      TypeRepositoryInterface $typeRepository,
      AgentRepositoryInterface $agentRepository,
      AmenityRepositoryInterface $amenityRepository,
      LanguageRepositoryInterface $languageRepository

    ) {
        $this->propertyRepository          = $propertyRepository;
        $this->statusTranslationRepository = $statusTranslationRepository;
        $this->typeRepository              = $typeRepository;
        $this->agentRepository             = $agentRepository;
        $this->amenityRepository           = $amenityRepository;
        $this->languageRepository          = $languageRepository;
    }

    public function allProperties()
    {
        $properties = $this->propertyRepository->all();

        return view('adminpanel.properties', [
          'properties' => $properties
        ]);
    }

    public function singleProperty(SinglePropertyRequest $request)
    {
        $property = $this->propertyRepository->findById($request->id);
        $statuses = $this->statusTranslationRepository->getAllDifferentStatuses(
          app()->currentLocale()
        );
        $agents    = $this->agentRepository->all();
        $amenities = $this->amenityRepository->all();
        $languages = $this->languageRepository->all();

        return view('adminpanel.single-property', [
          'property'  => $property,
          'statuses'  => $statuses,
          "types"     => $this->typeRepository->all(),
          "agents"    => $agents,
          "amenities" => $amenities,
          "languages" => $languages
        ]);
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

    public function deleteProperty(DeletePropertyRequest $request)
    {
        $this->propertyRepository->deleteById($request->id);

        return redirect('/home/properties')->with('successMessage', 'Deleted successfully');
    }
}
