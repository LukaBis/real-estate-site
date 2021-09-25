<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyRepositoryInterface;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Rules\Vertical;
use App\Http\Requests\DeleteHorizontalImageRequest;
use App\Repositories\PropertyHorizontalImageRepositoryInterface;
use App\Http\Requests\AddHorizontalImageRequest;

class PropertyImageController extends Controller
{
    private $propertyRepository;

    public function __construct(
      PropertyRepositoryInterface $propertyRepository,
      PropertyHorizontalImageRepositoryInterface $horizontalImageRepository
      ) {
        $this->propertyRepository = $propertyRepository;
        $this->horizontalImageRepository = $horizontalImageRepository;
    }

    public function updatePropertyVerticalImage(Request $request)
    {
        $request->validate([
          'verticalImage' => ['required', 'image', new Vertical],
          'propertyId'    => [
            'required',
            Rule::in($this->propertyRepository->allIdsInOneDimensionalArray())
          ]
        ]);

        // storing new file
        $fileName = time().'_'.$request->verticalImage->getClientOriginalName();

        $path = $request->verticalImage->storeAs(
          '/property_images/vertical_images', $fileName, 'images'
        );

        // delete current vertical image
        $oldImage = $this->propertyRepository->verticalImageFilename($request->propertyId);
        Storage::disk('images')->delete('/property_images/vertical_images/'.$oldImage);

        // update vertical_image column
        $property = $this->propertyRepository->update(
          $request->propertyId,
          ["vertical_image" => $fileName]
        );

        return redirect()->back()->with('successMessage', 'Image updated successfully');
    }

    public function deletePropertyHorizontalImage(DeleteHorizontalImageRequest $request)
    {
        // delete image
        $fileName = $this->horizontalImageRepository->getFilename($request->id);
        Storage::disk('images')->delete('/property_images/horizontal_images/'.$fileName);

        // delete horizontal image row
        $this->horizontalImageRepository->deleteById($request->id);

        return redirect()->back()->with('successMessage', 'Image deleted successfully');
    }

    public function addPropertyHorizontalImage(AddHorizontalImageRequest $request)
    {
        // store image
        $fileName = time().'_'.$request->horizontalImage->getClientOriginalName();

        $path = $request->horizontalImage->storeAs(
          '/property_images/horizontal_images', $fileName, 'images'
        );

        // store filename in database
        $this->horizontalImageRepository->create([
          "property_id" => $request->propertyId,
          "filename"    => $fileName
        ]);

        return redirect()->back()->with('successMessage', 'Image saved successfully');
    }
}
