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
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

    public function updatePropertyVerticalImage(Request $request)
    {
        $request->validate([
          'verticalImage' => 'required|image',
          'propertyId'    => [
            'required',
            Rule::in($this->propertyRepository->allIdsInOneDimensionalArray())
          ]
        ]);

        // storing new file
        $fileName = time().'_'.$request->verticalImage->getClientOriginalName();

        $path = $request->verticalImage->storeAs(
          '/property_images/vertical_images', $fileName, 'images'
        );

        // delete current vertical image
        $oldImage = $this->propertyRepository->verticalImageFilename($request->propertyId);
        Storage::disk('images')->delete('/property_images/vertical_images/'.$oldImage);

        // update vertical_image column
        $property = $this->propertyRepository->update(
          $request->propertyId,
          ["vertical_image" => $fileName]
        );

        return redirect()->back()->with('successMessage', 'Image updated successfully');
    }
}
