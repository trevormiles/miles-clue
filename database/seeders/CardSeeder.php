<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    public function run()
    {
        Card::insert([
            // Suspects
            ['name' => 'Brunette'],
            ['name' => 'Gray'],
            ['name' => 'Green'],
            ['name' => 'Meadowbrook'],
            ['name' => 'Mustard'],
            ['name' => 'Orchid'],
            ['name' => 'Peach'],
            ['name' => 'Peacock'],
            ['name' => 'Plum'],
            ['name' => 'Rose'],
            ['name' => 'Rusty'],
            ['name' => 'Scarlet'],
            ['name' => 'White'],

            // Weapons
            ['name' => 'Candlestick'],
            ['name' => 'Dagger'],
            ['name' => 'Garden Shears'],
            ['name' => 'Hammer'],
            ['name' => 'Horseshoe'],
            ['name' => 'Lawn Gnome'],
            ['name' => 'Lead Pipe'],
            ['name' => 'Poison'],
            ['name' => 'Revolver'],
            ['name' => 'Rope'],
            ['name' => 'Tennis Racquet'],
            ['name' => 'Water Bucket'],
            ['name' => 'Wrench'],

            // Rooms
            ['name' => 'Boat House'],
            ['name' => 'Carriage House'],
            ['name' => 'Courtyard'],
            ['name' => 'Drawing Room'],
            ['name' => 'Fountain'],
            ['name' => 'Garage'],
            ['name' => 'Gate House'],
            ['name' => 'Hall'],
            ['name' => 'Kitchen'],
            ['name' => 'Lounge'],
            ['name' => 'Study'],
            ['name' => 'Swimming Pool'],
            ['name' => 'Trophy Room'],
        ]);
    }
}
