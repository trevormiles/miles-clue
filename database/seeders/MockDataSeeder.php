<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Mock\PlayerSeeder;
use Database\Seeders\Mock\GameSeeder;

class MockDataSeeder extends Seeder
{
    public function run()
    {
        $this->call(CardSeeder::class);
        $this->call(GameTypeSeeder::class);
        $this->call(CardGameTypeSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(GameSeeder::class);
    }
}
