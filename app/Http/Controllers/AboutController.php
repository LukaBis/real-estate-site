<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\AboutRepositoryInterface;

class AboutController extends Controller
{
    private $languageRepository;
    private $agentRepository;

    public function __construct(
        LanguageRepositoryInterface $languageRepository,
        AgentRepositoryInterface $agentRepository,
        AboutRepositoryInterface $aboutRepository
      ) {
        $this->languageRepository = $languageRepository;
        $this->agentRepository    = $agentRepository;
        $this->aboutRepository    = $aboutRepository;
    }

    public function aboutPage()
    {
        $languages  = $this->languageRepository->all();
        $agents     = $this->agentRepository->all();
        $about      = $this->aboutRepository->all()[0];

        // we'll take only 3 agents
        $agents = $agents->slice(0,3);

        return view('about', [
          'languages' => $languages,
          'agents'    => $agents,
          'about'     => $about
        ]);
    }
}
