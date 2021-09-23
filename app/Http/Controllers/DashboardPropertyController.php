<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyRepositoryInterface;
use App\Http\Requests\SinglePropertyRequest;

class DashboardPropertyController extends Controller
{
    private $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository) {
        $this->propertyRepository = $propertyRepository;
    }

    public function allProperties()
    {
        $properties = $this->propertyRepository->all();

        return view('adminpanel.properties', [
          'properties' => $properties
        ]);
    }

    public function singleProperty(SinglePropertyRequest $request)
    {
        $property = $this->propertyRepository->findById($request->id);
        
        return view('adminpanel.single-property', [
          'property' => $property
        ]);
    }
}
