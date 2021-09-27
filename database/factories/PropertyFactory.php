<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\RandomAgentId;
use App\Helpers\RandomStatusId;
use App\Helpers\RandomTypeId;
use App\Helpers\RandomPropertyTranslation;
use App\Models\PropertyTranslation;
use App\Models\AmenityProperty;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\Status;
use App\Models\Type;
use App\Helpers\GetPropertyVerticalImage;

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

            // adding translation
            $property_translations = RandomPropertyTranslation::translation();

            foreach ($property_translations as $locale => $description) {
                PropertyTranslation::create([
                  "property_id" => $property->id,
                  "locale" => $locale,
                  "description" => $description
                ]);
            }

            // adding amenities for this property
            $numberOfAmenitiesPerProperty = 9;
            $allAmenitiesIds = array_column(Amenity::select('id')->get()->toArray(),'id');

            $random_keys = array_rand($allAmenitiesIds, $numberOfAmenitiesPerProperty);

            for ($i = 0; $i < $numberOfAmenitiesPerProperty; $i++) {
              AmenityProperty::create([
                'property_id' => $property->id,
                'amenity_id' => $allAmenitiesIds[$random_keys[$i]]
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
            'street_name'    => $this->faker->streetName(),
            'house_number'   => $this->faker->buildingNumber(),
            'city'           => $this->faker->city(),
            'price'          => rand(150, 300) * 1000,
            'area'           => rand(120, 500),
            'beds'           => rand(1, 10),
            'baths'          => rand(1, 3),
            'garage'         => rand(1,2),
            "rent"           => rand(700, 3500),
            "agent_id"       => RandomAgentId::agent(),
            "type_id"        => RandomTypeId::type(),
            "status_id"      => RandomStatusId::status(),
            'vertical_image' => GetPropertyVerticalImage::image()
        ];
    }
}
