<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AboutRepositoryInterface;
use App\Http\Requests\UpdateOrCreateAboutRequest;

class DashboardAboutController extends Controller
{
    private $languageRepository;
    private $aboutRepository;

    public function __construct(
      AboutRepositoryInterface $aboutRepository,
      LanguageRepositoryInterface $languageRepository,
    ) {
        $this->aboutRepository    = $aboutRepository;
        $this->languageRepository = $languageRepository;
    }

    public function aboutView()
    {
        $about = $this->aboutRepository->all();

        return view("adminpanel.about", [
          "languages" => $this->languageRepository->all(),
          "about"     => $about
        ]);
    }

    public function updateOrCreateAbout(UpdateOrCreateAboutRequest $request)
    {
        dd($request);
    }
}
