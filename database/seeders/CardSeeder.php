<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use App\Models\CardCategory;
use Illuminate\Support\Carbon;

class CardSeeder extends Seeder
{
    public function run()
    {
        $suspectCategory = CardCategory::where('name', 'Suspect')->first();
        $weaponCategory = CardCategory::where('name', 'Weapon')->first();
        $roomCategory = CardCategory::where('name', 'Room')->first();

        Card::insert([
            // Suspects
            ['name' => 'Brunette', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gray', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Green', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Meadowbrook', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Mustard', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Orchid', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Peach', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Peacock', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Plum', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Rose', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Rusty', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Scarlet', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'White', 'card_category_id' => $suspectCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Weapons
            ['name' => 'Candlestick', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dagger', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Garden Shears', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hammer', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Horseshoe', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lawn Gnome', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lead Pipe', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Poison', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Revolver', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Rope', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Tennis Racquet', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Water Bucket', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Wrench', 'card_category_id' => $weaponCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Rooms
            ['name' => 'Boat House', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Carriage House', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Courtyard', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Drawing Room', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Fountain', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Garage', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gate House', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hall', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kitchen', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lounge', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Study', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Swimming Pool', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Trophy Room', 'card_category_id' => $roomCategory->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
