<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TestemonialRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Http\Requests\SingleTestemonialRequest;
use App\Http\Requests\UpdateTestemonialRequest;
use App\Http\Requests\UpdateTestemonialBigImageRequest;
use Illuminate\Support\Facades\Storage;

class TestemonialController extends Controller
{
    private $testemonialRepository;
    private $languageRepository;

    public function __construct(
      TestemonialRepositoryInterface $testemonialRepository,
      LanguageRepositoryInterface $languageRepository
    ) {
        $this->testemonialRepository = $testemonialRepository;
        $this->languageRepository    = $languageRepository;
    }

    public function allTestemonials()
    {
        $testemonials = $this->testemonialRepository->all();

        return view('adminpanel.testemonials', [
          "testemonials" => $testemonials
        ]);
    }

    public function singleTestemonial(SingleTestemonialRequest $request)
    {
        $testemonial = $this->testemonialRepository->findById($request->id);
        $languages   = $this->languageRepository->all();

        return view('adminpanel.single-testemonial', [
          "testemonial" => $testemonial,
          "languages"   => $languages
        ]);
    }

    public function updateTestemonial(UpdateTestemonialRequest $request)
    {
        $testemonialData = [
          "names" => $request["names"]
        ];

        $languages = $this->languageRepository->all();

        foreach ($languages as $language) {
          $testemonialData[$language->iso] = [
            "text" => $request[$language->iso.'-text']
          ];
        };

        $this->testemonialRepository->update($request->id, $testemonialData);

        return redirect()->back()->with('successMessage', 'Updated successfully');
    }

    public function updateBigImage(UpdateTestemonialBigImageRequest $request)
    {
        // delete current image
        $oldImage = $this->testemonialRepository->BigImageFilename($request->testemonialId);
        Storage::disk('images')->delete('/testemonial_images/'.$oldImage);

        // store new image
        $fileName = time().'_'.$request["big-image"]->getClientOriginalName();

        $path = $request["big-image"]->storeAs(
          '/testemonial_images/', $fileName, 'images'
        );

        // update image column
        $this->testemonialRepository->update(
          $request->testemonialId,
          ["image_filename" => $fileName]
        );

        return redirect()->back()->with('successMessage', 'Image updated successfully');
    }
}
