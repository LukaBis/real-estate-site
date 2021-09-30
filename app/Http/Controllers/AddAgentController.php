<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Http\Requests\AddNewAgentRequest;
use Illuminate\Support\Facades\Storage;

class AddAgentController extends Controller
{
    private $languageRepository;
    private $propertyRepository;
    private $agentRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository,
      AgentRepositoryInterface $agentRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->propertyRepository = $propertyRepository;
        $this->agentRepository    = $agentRepository;
    }

    public function addAgentView()
    {
        $languages  = $this->languageRepository->all();
        $properties = $this->propertyRepository->all();

        return view('adminpanel.add-agent', [
          "languages"  => $languages,
          "properties" => $properties
        ]);
    }

    public function addAgent(AddNewAgentRequest $request)
    {
        $fileName = time().'_'.$request->image->getClientOriginalName();

        $agentData = [
          "full_name" => $request->full_name,
          "phone"     => $request->phone,
          "email"     => $request->email,
          "image"     => $fileName
        ];

        // save image
        $path = $request->image->storeAs(
          '/agent_images', $fileName, 'images'
        );

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

        $this->agentRepository->createAgent($agentData, $choosenPropertyIds);

        return redirect('/home/agents')->with('successMessage', 'Saved successfully');
    }
}
