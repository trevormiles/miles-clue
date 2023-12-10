<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Mock\PlayerSeeder;
use Database\Seeders\Mock\GameSeeder;
use Database\Seeders\CardVariantSeeder;
use Database\Seeders\CardVariantGameTypeSeeder;

class MockDataSeeder extends Seeder
{
    public function run()
    {
        $this->call(CardCategorySeeder::class);
        $this->call(CardSeeder::class);
        $this->call(GameTypeSeeder::class);
        $this->call(CardGameTypeSeeder::class);
        $this->call(CardVariantSeeder::class);
        $this->call(CardVariantGameTypeSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(GameSeeder::class);
    }
}
