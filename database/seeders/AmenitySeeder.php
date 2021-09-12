<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\ArrayOfAmenities;
use App\Repositories\AmenityRepositoryInterface;

class AmenitySeeder extends Seeder
{
    private $amenityRepository;

    public function __construct(AmenityRepositoryInterface $amenityRepository)
    {
        $this->amenityRepository = $amenityRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $amenities = ArrayOfAmenities::amenities();

      foreach ($amenities as $amenity) {
        $this->amenityRepository->create($amenity);
      }

    }
}
