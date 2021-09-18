<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\TypeRepositoryInterface;

class TypeSeeder extends Seeder
{
    private $typeRepository;

    public function __construct(TypeRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
          [
            "en"  => ["name" => "Villa"],
            "hrv" => ["name" => "Villa"]
          ],
          [
            "en"  => ["name" => "House"],
            "hrv" => ["name" => "Kuća"]
          ],
          [
            "en"  => ["name" => "Apartment"],
            "hrv" => ["name" => "Apartman"]
          ]
        ];

        foreach ($types as $type) {
            $this->typeRepository->create($type);
        }
    }
}
