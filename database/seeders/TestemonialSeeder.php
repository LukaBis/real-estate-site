<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\TestemonialRepositoryInterface;
use App\Helpers\ArrayOfTestemonials;

class TestemonialSeeder extends Seeder
{
    private $testemonialRepository;

    public function __construct(TestemonialRepositoryInterface $testemonialRepository)
    {
        $this->testemonialRepository = $testemonialRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testemonials = ArrayOfTestemonials::getArray();

        foreach ($testemonials as $testemonial) {
          $this->testemonialRepository->create($testemonial);
        }
    }
}
