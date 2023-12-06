<?php

namespace Database\Seeders;

use App\Models\CardCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CardCategorySeeder extends Seeder
{
    public function run()
    {
        CardCategory::insert([
            ['name' => 'Suspect', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Weapon', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Room', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
