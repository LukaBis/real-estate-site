<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;
use Illuminate\Pagination\LengthAwarePaginator;

class StatusFilterTest extends TestCase
{
    /**
     * A basic feature test example.
     * @dataProvider statusDataProvider
     * @return void
     */
    public function test_example($status)
    {
        $locale = "en";
        $response = $this->get('/'.$locale.'/properties?status='.$status);

        switch($status) {
          case "All":
            $response->assertViewHas('properties', function (LengthAwarePaginator $properties) {
                return $properties->total() === Property::all()->count();
            });
            break;
          case "1":
            $response->assertViewHas('properties', function (LengthAwarePaginator $properties) {

                $allActive = true;

                foreach ($properties as $property) {
                  if ($property->status_id != "1") $allActive = false;
                }

                return ($properties->total() === Property::where('status_id', "1")->count() && $allActive);
            });
            break;
            case "2":
              $response->assertViewHas('properties', function (LengthAwarePaginator $properties) {

                  $allSold = true;

                  foreach ($properties as $property) {
                    if ($property->status_id != "2") $allSold = false;
                  }

                  return ($properties->total() === Property::where('status_id', "2")->count() && $allSold);
              });
            break;
        }
    }

    public function statusDataProvider()
    {
        return [
            ['All'],
            ['1'],
            ['2'],
        ];
    }
}
