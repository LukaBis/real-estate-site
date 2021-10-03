<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\ContactRepositoryInterface;

class ContactsSeeder extends Seeder
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactInfo = [
          "email"        => "estateagency@email.com",
          "phone"        => "54356945234",
          "city"         => "New York",
          "street_name"  => "7th Ave",
          "house_number" => "10036"
        ];

        $this->contactRepository->create($contactInfo);
    }
}
