<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Repositories\LanguageRepositoryInterface;

class LanguageSeeder extends Seeder
{
    private $languageRepository;

    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
          [
            "iso" => "en",
            "en" => ["name" => "english"],
            "hrv" => ["name" => "engleski"]
          ],
          [
            "iso" => "hrv",
            "en" => ["name" => "croatian"],
            "hrv" => ["name" => "hrvatski"]
          ]
        ];

        foreach ($languages as $language) {
          $this->languageRepository->create($language);
        }
    }
}
