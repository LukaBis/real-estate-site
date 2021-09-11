<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\RandomAgentId;
use App\Helpers\RandomPropertyTranslation;
use App\Models\PropertyTranslation;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Property $property) {
          $property_translations = RandomPropertyTranslation::translation();

          foreach ($property_translations as $locale => $description) {
              PropertyTranslation::create([
                "property_id" => $property->id,
                "locale" => $locale,
                "description" => $description
              ]);
          }

        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street_name' => $this->faker->streetName(),
            'house_number' => $this->faker->buildingNumber(),
            'city' => $this->faker->city(),
            'price' => rand(150, 300) * 1000,
            'type' => ["House", "Apartment", "Bungalov", "Villa"][rand(0,3)],
            'status' => ["sale", "sold"][rand(0,1)],
            'area' => rand(120, 500),
            'beds' => rand(1, 10),
            'baths' => rand(1, 3),
            'garage' => 1,
            "rent" => rand(700, 3500),
            "agent_id" => RandomAgentId::agent()
        ];
    }
}
