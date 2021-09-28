<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\StatusTranslationRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\AmenityRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Http\Requests\AddNewPropertyRequest;
use App\Repositories\PropertyHorizontalImageRepositoryInterface;
use App\Repositories\AmenityPropertyRepositoryInterface;

class AddPropertyController extends Controller
{
    private $propertyRepository;
    private $statusTranslationRepository;
    private $typeRepository;
    private $agentRepository;
    private $amenityRepository;
    private $languageRepository;
    private $horizontalImageRepository;
    private $amenityPropertyRepository;

    public function __construct(
      PropertyRepositoryInterface $propertyRepository,
      StatusTranslationRepositoryInterface $statusTranslationRepository,
      TypeRepositoryInterface $typeRepository,
      AgentRepositoryInterface $agentRepository,
      AmenityRepositoryInterface $amenityRepository,
      LanguageRepositoryInterface $languageRepository,
      PropertyHorizontalImageRepositoryInterface $horizontalImageRepository,
      AmenityPropertyRepositoryInterface $amenityPropertyRepository
      ) {
        $this->propertyRepository          = $propertyRepository;
        $this->statusTranslationRepository = $statusTranslationRepository;
        $this->typeRepository              = $typeRepository;
        $this->agentRepository             = $agentRepository;
        $this->amenityRepository           = $amenityRepository;
        $this->languageRepository          = $languageRepository;
        $this->horizontalImageRepository   = $horizontalImageRepository;
        $this->amenityPropertyRepository   = $amenityPropertyRepository;
    }

    public function addPropertyView()
    {
        $statuses = $this->statusTranslationRepository->getAllDifferentStatuses(
          app()->currentLocale()
        );
        $agents    = $this->agentRepository->all();
        $amenities = $this->amenityRepository->all();
        $languages = $this->languageRepository->all();
        $types     = $this->typeRepository->all();

        return view('adminpanel.add-property', [
          'statuses'  => $statuses,
          "types"     => $types,
          "agents"    => $agents,
          "amenities" => $amenities,
          "languages" => $languages
        ]);
    }

    public function addProperty(AddNewPropertyRequest $request)
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

        // storing vertical image
        $fileName = time().'_'.$request->verticalImage->getClientOriginalName();
        $path = $request->verticalImage->storeAs(
          '/property_images/vertical_images', $fileName, 'images'
        );

        $propertyData["vertical_image"] = $fileName;

        // creating new property
        $newProperty = $this->propertyRepository->create($propertyData);

        // add amenities to property
        foreach ($choosenAmenityIds as $amenityId) {
          $this->amenityPropertyRepository->create([
            "amenity_id" => $amenityId,
            "property_id" => $newProperty->id
          ]);
        }

        // add horizontal images to property
        foreach ($request->horizontalImages as $image) {
          // store image
          $fileName = time().'_'.$image->getClientOriginalName();
          $path = $image->storeAs(
            '/property_images/horizontal_images', $fileName, 'images'
          );

          // store filename in database
          $this->horizontalImageRepository->create([
            "property_id" => $newProperty->id,
            "filename"    => $fileName
          ]);
        }

        return redirect('home/property/'.$newProperty->id)->with('successMessage', 'Saved successfully');
    }
}
