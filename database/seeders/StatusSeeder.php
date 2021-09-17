<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\StatusRepositoryInterface;

class StatusSeeder extends Seeder
{
    private $statusRepository;

    public function __construct(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
          [
            "en" => ["status" => "active"],
            "hrv" => ["status" => "aktivno"]
          ],
          [
            "en" => ["status" => "sold"],
            "hrv" => ["status" => "prodano"]
          ]
        ];

        foreach ($statuses as $status) {
          $this->statusRepository->create($status);
        }
    }
}
