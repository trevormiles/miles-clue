<?php

namespace Database\Seeders;

use App\Models\GameType;
use App\Models\CardGameType;
use App\Models\Card;
use Illuminate\Database\Seeder;

class CardGameTypeSeeder extends Seeder
{
    public function run()
    {
        $singleClueGameType = GameType::where('name', 'single')->first();
        $singleClueCards = [
            // Suspects
            'Brunette',
            'Gray',
            'Green',
            'Meadowbrook',
            'Mustard',
            'Orchid',
            'Peach',
            'Peacock',
            'Plum',
            'Rose',
            'Rusty',
            'Scarlet',
            'White',

            // Weapons
            'Candlestick',
            'Dagger',
            'Garden Shears',
            'Hammer',
            'Horseshoe',
            'Lawn Gnome',
            'Lead Pipe',
            'Poison',
            'Revolver',
            'Rope',
            'Tennis Racquet',
            'Water Bucket',
            'Wrench',

            // Rooms
            'Boat House',
            'Carriage House',
            'Courtyard',
            'Drawing Room',
            'Fountain',
            'Garage',
            'Gate House',
            'Hall',
            'Kitchen',
            'Lounge',
            'Study',
            'Swimming Pool',
            'Trophy Room',
        ];

        foreach ($singleClueCards as $card) {
            CardGameType::create([
                'card_id' => Card::where('name', $card)->firstOrFail()->id,
                'game_type_id' => $singleClueGameType->id,
            ]);
        }
    }
}
