<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Helpers\ArrayOfAgents;

class HomeController extends Controller
{
    private $languageRepository;
    private $agentRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      AgentRepositoryInterface $agentRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->agentRepository = $agentRepository;
    }

    public function homePage()
    {
        $languages = $this->languageRepository->all();

        return view('home', [
          'languages' => $languages
        ]);
    }
}
