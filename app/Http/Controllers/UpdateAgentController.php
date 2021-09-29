<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Http\Requests\UpdateAgentRequest;

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
}
