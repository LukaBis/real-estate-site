<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeletePropertyRequest;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\PropertyHorizontalImageRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class DeletePropertyController extends Controller
{
    private $propertyRepository;
    private $horizontalImageRepository;

    public function __construct(
      PropertyRepositoryInterface $propertyRepository,
      PropertyHorizontalImageRepositoryInterface $horizontalImageRepository
    ) {
        $this->propertyRepository = $propertyRepository;
        $this->horizontalImageRepository = $horizontalImageRepository;
    }

    public function deleteProperty(DeletePropertyRequest $request)
    {
        // delete all images related to this property
        // delete vertical image
        $oldImage = $this->propertyRepository->verticalImageFilename($request->id);
        Storage::disk('images')->delete('/property_images/vertical_images/'.$oldImage);

        // delete all horizontal images
        $horizontalImages = $this->propertyRepository->allHorizontalImages($request->id);

        foreach ($horizontalImages as $image) {
          Storage::disk('images')->delete('/property_images/horizontal_images/'.$image["filename"]);
          // delete horizontal image row
          $this->horizontalImageRepository->deleteById($image["id"]);
        }

        // delete property from properties table
        $this->propertyRepository->deleteById($request->id);

        return redirect('/home/properties')->with('successMessage', 'Deleted successfully');
    }
}
