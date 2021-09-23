<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PropertyRepositoryInterface;

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
}
