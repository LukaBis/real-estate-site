<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;

class ContactController extends Controller
{
    private $contactRepository;
    private $languageRepository;

    public function __construct(
      LanguageRepositoryInterface $languageRepository,
      ContactRepositoryInterface $contactRepository
      ) {
        $this->contactRepository = $contactRepository;
        $this->languageRepository = $languageRepository;
    }

    public function contact()
    {
        $contact = $this->contactRepository->all();
        $languages  = $this->languageRepository->all();

        return view('contact', [
          'contact' => $contact[0],
          'languages' => $languages
        ]);
    }
}
