<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Http\Requests\UpdateAgentRequest;
use App\Http\Requests\UpdateAgentImageRequest;
use Illuminate\Support\Facades\Storage;

class UpdateAgentController extends Controller
{
    private $languageRepository;
    private $agentRepository;
    private $propertyRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      AgentRepositoryInterface $agentRepository,
      PropertyRepositoryInterface $propertyRepository
    ) {
        $this->languageRepository = $languageRepository;
        $this->agentRepository    = $agentRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function updateAgent(UpdateAgentRequest $request)
    {
        $agentData = [
          "full_name" => $request->full_name,
          "phone" => $request->phone,
          "email" => $request->email,
        ];

        $languages = $this->languageRepository->all();
        // adding description translations
        foreach ($languages as $language) {
          $agentData[$language->iso] = [
            "about" => $request[$language->iso."-description"]
          ];
        };

        // array of property ids
        $choosenPropertyIds = [];
        $allPropertyIds = $this->propertyRepository->allIdsInOneDimensionalArray();

        foreach ($allPropertyIds as $propertyId) {
          if ($request["property".$propertyId] != null) {
            array_push($choosenPropertyIds, $propertyId);
          }
        }

        $this->agentRepository->updateAgent(
          $request->agentId,
          $agentData,
          $choosenPropertyIds
        );

        return redirect()->back()->with('successMessage', 'Updated successfully');
    }

    public function updateImage(UpdateAgentImageRequest $request)
    {
        $fileName = time().'_'.$request->image->getClientOriginalName();

        $path = $request->image->storeAs(
          '/agent_images', $fileName, 'images'
        );

        // delete current agent image
        $oldImage = $this->agentRepository->image($request->agentId);
        Storage::disk('images')->delete('/agent_images/'.$oldImage);

        // update image column
        $this->agentRepository->update(
          $request->agentId,
          ["image" => $fileName]
        );

        return redirect()->back()->with('successMessage', 'Image updated successfully');
    }
}
