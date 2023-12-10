<?php

namespace Database\Seeders;

use App\Models\CardVariant;
use Illuminate\Database\Seeder;

class CardVariantSeeder extends Seeder
{
    public function run()
    {
        CardVariant::insert([
            ['name' => 'Old'],
            ['name' => 'Middle'],
            ['name' => 'New'],
        ]);
    }
}
