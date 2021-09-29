<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Http\Requests\AddNewAgentRequest;

class AddAgentController extends Controller
{
    private $languageRepository;
    private $propertyRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      PropertyRepositoryInterface $propertyRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->propertyRepository = $propertyRepository;
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
        dd($request);
    }
}
