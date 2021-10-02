<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AboutRepositoryInterface;
use App\Http\Requests\UpdateOrCreateAboutRequest;
use Illuminate\Support\Facades\Storage;

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
        // if about row already exits in database then it has to update the row
        // if it doesn't exists then it has to create new row in database
        if (count($this->aboutRepository->allIdsInOneDimensionalArray())) {
          $this->updateAbout(
            $request,
            $this->aboutRepository->allIdsInOneDimensionalArray()[0]
          );
        } else {
          $this->createAbout($request);
        }

        return redirect('home/about')->with('successMessage', 'Saved successfully');
    }

    private function createAbout($request)
    {
        $languages = $this->languageRepository->all();
        $aboutData = [];

        foreach ($languages as $language) {
          $aboutData[$language->iso] = [
            "title"    => $request[$language->iso."-title"],
            "subtitle" => $request[$language->iso."-subtitle"],
            "text"     => $request[$language->iso."-text"]
          ];
        };

        if ($request["horizontal-image"]) {
          $fileName = time().'_'.$request["horizontal-image"]->getClientOriginalName();
          $aboutData["horizontal_image"] = $fileName;
          // store new image
          $path = $request["horizontal-image"]->storeAs(
            '/about_images/horizontal/', $fileName, 'images'
          );
        }

        if ($request["vertical-image"]) {
          $fileName = time().'_'.$request["vertical-image"]->getClientOriginalName();
          $aboutData["vertical_image"] = $fileName;
          // store new image
          $path = $request["vertical-image"]->storeAs(
            '/about_images/vertical/', $fileName, 'images'
          );
        }

        $this->aboutRepository->create($aboutData);
    }

    private function updateAbout($request, $id)
    {
        $languages = $this->languageRepository->all();
        $aboutData = [];

        foreach ($languages as $language) {
          $aboutData[$language->iso] = [
            "title"    => $request[$language->iso."-title"],
            "subtitle" => $request[$language->iso."-subtitle"],
            "text"     => $request[$language->iso."-text"]
          ];
        };

        if ($request["horizontal-image"]) {
          $fileName = time().'_'.$request["horizontal-image"]->getClientOriginalName();
          $aboutData["horizontal_image"] = $fileName;
          // delete old image
          $oldImage = $this->aboutRepository->horizontalImageFilename();
          Storage::disk('images')->delete('/about_images/horizontal/'.$oldImage);
          // store new image
          $path = $request["horizontal-image"]->storeAs(
            '/about_images/horizontal/', $fileName, 'images'
          );
        }

        if ($request["vertical-image"]) {
          $fileName = time().'_'.$request["vertical-image"]->getClientOriginalName();
          $aboutData["vertical_image"] = $fileName;
          // delete old image
          $oldImage = $this->aboutRepository->verticalImageFilename();
          Storage::disk('images')->delete('/about_images/vertical/'.$oldImage);
          // store new image
          $path = $request["vertical-image"]->storeAs(
            '/about_images/vertical/', $fileName, 'images'
          );
        }

        $this->aboutRepository->update($id, $aboutData);
    }
}
