<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepositoryInterface;
use App\Http\Requests\UpdateOrCreateContactRequest;

class DashboardContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function contactView()
    {
        $contact = $this->contactRepository->all();

        return view("adminpanel.contact", [
          "contact" => $contact
        ]);
    }

    public function updateOrCreateContact(UpdateOrCreateContactRequest $request)
    {
        // if contact row already exits in database then it has to update the row
        // if it doesn't exists then it has to create new row in database
        if (count($this->contactRepository->allIdsInOneDimensionalArray())) {
          $this->updateContact(
            $request,
            $this->contactRepository->allIdsInOneDimensionalArray()[0]
          );
        } else {
          $this->createContact($request);
        }

        return redirect('home/contact')->with('successMessage', 'Saved successfully');
    }

    private function updateContact($request, $id)
    {
        $contactData = [
          "email" => $request->email,
          "phone" => $request->phone,
          "city" => $request->city,
          "street_name" => $request->street_name,
          "house_number" => $request->house_number
        ];

        $this->contactRepository->update($id, $contactData);
    }

    private function createContact($request)
    {
        $contactData = [
          "email" => $request->email,
          "phone" => $request->phone,
          "city" => $request->city,
          "street_name" => $request->street_name,
          "house_number" => $request->house_number
        ];

        $this->contactRepository->create($contactData);
    }
}
