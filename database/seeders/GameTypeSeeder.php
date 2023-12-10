<?php

namespace Database\Seeders;

use App\Models\GameType;
use Illuminate\Database\Seeder;

class GameTypeSeeder extends Seeder
{
    public function run()
    {
        GameType::insert([
            ['name' => 'Single'],
            ['name' => 'Double']
        ]);
    }
}
