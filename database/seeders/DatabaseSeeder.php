<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CardCategorySeeder::class);
        $this->call(CardSeeder::class);
        $this->call(GameTypeSeeder::class);
        $this->call(CardGameTypeSeeder::class);
    }
}
