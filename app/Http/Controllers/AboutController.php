<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\AboutRepositoryInterface;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;

class AboutController extends Controller
{
    private $languageRepository;
    private $agentRepository;
    private $aboutRepository;
    private $contactRepository;
    private $typeRepository;
    private $propertyRepository;

    public function __construct(
        LanguageRepositoryInterface $languageRepository,
        AgentRepositoryInterface $agentRepository,
        AboutRepositoryInterface $aboutRepository,
        ContactRepositoryInterface $contactRepository,
        TypeRepositoryInterface $typeRepository,
        PropertyRepositoryInterface $propertyRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->agentRepository    = $agentRepository;
        $this->aboutRepository    = $aboutRepository;
        $this->contactRepository  = $contactRepository;
        $this->typeRepository     = $typeRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function aboutPage()
    {
        $languages  = $this->languageRepository->all();
        $agents     = $this->agentRepository->all();
        $contact    = $this->contactRepository->all();

        if (count($this->aboutRepository->allIdsInOneDimensionalArray())) {
          $about = $this->aboutRepository->all()[0];
        } else {
          $about = null;
        }

        // we'll take only 3 agents
        $agents = $agents->slice(0,3);

        $filters = [
          "types"   => $this->typeRepository->allTypesInArray(),
          "cities"  => $this->propertyRepository->allCities(),
          "beds"    => $this->propertyRepository->allBedsNumbers(),
          "garages" => $this->propertyRepository->allGarageNumbers(),
          "baths"   => $this->propertyRepository->allBathsNumbers(),
        ];

        return view('about', [
          'languages' => $languages,
          'agents'    => $agents,
          'about'     => $about,
          'contact'   => $contact,
          'filters'   => $filters
        ]);
    }
}
