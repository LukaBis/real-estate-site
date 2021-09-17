<?php

namespace Database\Factories;

use App\Models\PropertyStatus;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status_ids = array_column(Status::select('id')->get()->toArray(), 'id');

        return [
            'status_id' => $status_ids[rand(0, count($status_ids) - 1)]
        ];
    }
}
