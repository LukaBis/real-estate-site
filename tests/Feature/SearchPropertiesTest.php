<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Property;
use App\Models\TypeTranslation;

class SearchPropertiesTest extends TestCase
{
    /**
     * A basic feature test example.
     * @dataProvider paramsDataProvider
     * @return void
     */
    public function test_example($searchData)
    {
        $response = $this->get('/'.$searchData["locale"].'/properties?' . http_build_query($searchData));

        $response->assertViewHas('properties', function (LengthAwarePaginator $properties) use($searchData) {
            $columnValuesMatch = true;
            // check if each property has requested column values
            foreach ($properties as $property) {
              if ($searchData["type"] != "Any") {
                  $type_id = TypeTranslation::where([
                    ["name", $searchData["type"]],
                    ["locale", $searchData["locale"]]
                  ])->get()[0]->type_id;

                  $columnValuesMatch = ($property->type_id == $type_id);
              };

              if ($searchData["city"] != "Any") $columnValuesMatch = ($property->city == $searchData["city"]);
              if ($searchData["beds"] != "Any") $columnValuesMatch = ($property->beds == $searchData["beds"]);
              if ($searchData["garages"] != "Any") $columnValuesMatch = ($property->garage == $searchData["garages"]);
              if ($searchData["bathrooms"] != "Any") $columnValuesMatch = ($property->baths == $searchData["bathrooms"]);
              if ($searchData["minPrice"] != null) $columnValuesMatch = ($property->price > $searchData["minPrice"]);
            }
            // check if number of properties is expected
            $queryData = [];

            if ($searchData["type"] != "Any") {
              array_push($queryData, ["type_id","=" , TypeTranslation::where([
                ["name", $searchData["type"]],
                ["locale", $searchData["locale"]]
              ])->get()[0]->type_id ]);
            }

            if ($searchData["city"] != "Any") array_push($queryData, ["city","=" ,$searchData["city"]]);
            if ($searchData["beds"] != "Any") array_push($queryData, ["beds","=" ,$searchData["beds"]]);
            if ($searchData["garages"] != "Any") array_push($queryData, ["garage","=" ,$searchData["garages"]]);
            if ($searchData["bathrooms"] != "Any") array_push($queryData, ["baths","=" ,$searchData["bathrooms"]]);
            if ($searchData["minPrice"] != null) array_push($queryData, ["price",">" ,$searchData["minPrice"]]);

            $numberOfProperties = Property::where($queryData)->get()->count();

            return $columnValuesMatch && ($numberOfProperties == $properties->total());
        });

    }

    public function paramsDataProvider()
    {
        return [
          [
            [
              "type" => "House",
              "city" => "Any",
              "beds" => "Any",
              "garages" => "Any",
              "bathrooms" => "Any",
              "minPrice" => null,
              "locale" => "en"
            ]
          ],
          [
            [
              "type" => "House",
              "city" => "Any",
              "beds" => "Any",
              "garages" => "1",
              "bathrooms" => "Any",
              "minPrice" => null,
              "locale" => "en"
            ]
          ],
          [
            [
              "type" => "House",
              "city" => "Any",
              "beds" => "Any",
              "garages" => "Any",
              "bathrooms" => "Any",
              "minPrice" => "190000",
              "locale" => "en"
            ]
          ],

            [
              [
                "type" => "Villa",
                "city" => "Any",
                "beds" => "Any",
                "garages" => "
                1",
              "bathrooms" => "Any",
              "minPrice" => null,
              "locale" => "en"
            ]
          ],
          [
            [
              "type" => "Villa",
              "city" => "Any",
              "beds" => "Any",
              "garages" => "1",
              "bathrooms" => "3",
              "minPrice" => null,
              "locale" => "en"
            ]
          ],
          [
            [
              "type" => "Villa",
              "city" => "Any",
              "beds" => "Any",
              "garages" => "1",
              "bathrooms" => "2",
              "minPrice" => null,
              "locale" => "en"
            ]
          ],
          [
            [
              "type" => "Apartment",
              "city" => "Any",
              "beds" => "Any",
              "garages" => "Any",
              "bathrooms" => "Any",
              "minPrice" => "190000",
              "locale" => "en"
            ]
          ],
          [
            [
              "type" => "Apartman",
              "city" => "Any",
              "beds" => "Any",
              "garages" => "Any",
              "bathrooms" => "Any",
              "minPrice" => "190000",
              "locale" => "hrv"
            ]
          ],
          [
            [
              "type" => "Kuća",
              "city" => "Cristton",
              "beds" => "Any",
              "garages" => "Any",
              "bathrooms" => "Any",
              "minPrice" => null,
              "locale" => "hrv"
            ]
          ],
          [
            [
              "type" => "Kuća",
              "city" => "Loganshire",
              "beds" => "7",
              "garages" => "1",
              "bathrooms" => "Any",
              "minPrice" => null,
              "locale" => "hrv"
            ]
          ],
        ];
    }
}
