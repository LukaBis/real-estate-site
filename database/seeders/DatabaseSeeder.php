<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          LanguageSeeder::class,
          AgentSeeder::class,
          AmenitySeeder::class,
          StatusSeeder::class,
          TypeSeeder::class,
          PropertySeeder::class,
          TestemonialSeeder::class,
          AboutSeeder::class,
          ContactsSeeder::class,
          UserSeeder::class
        ]);
    }
}
