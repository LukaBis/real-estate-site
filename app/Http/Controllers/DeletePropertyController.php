<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeletePropertyRequest;
use App\Repositories\PropertyRepositoryInterface;

class DeletePropertyController extends Controller
{
    private $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function deleteProperty(DeletePropertyRequest $request)
    {
        $this->propertyRepository->deleteById($request->id);

        return redirect('/home/properties')->with('successMessage', 'Deleted successfully');
    }
}
