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
        // Single Clue
        $singleClueGameType = GameType::where('name', 'Single')->first();
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

        // Double Clue
        // $doubleClueGameType = GameType::where('name', 'Double')->first();
        // $doubleClueCards = [
        //     // Suspects
        //     'Green',
        //     'Mustard',
        //     'Peach',
        //     'Peacock',
        //     'Plum',
        //     'Scarlet',
        //     'White',

        //     // Weapons
        //     'Candlestick',
        //     'Lead Pipe',
        //     'Revolver',
        //     'Rope',
        //     'Wrench',

        //     // Rooms
        //     'Boat House',
        //     'Carriage House',
        //     'Hall',
        //     'Kitchen',
        //     'Lounge',
        //     'Study',
        // ];

        // foreach ($doubleClueCards as $card) {
        //     CardGameType::create([
        //         'card_id' => Card::where('name', $card)->firstOrFail()->id,
        //         'game_type_id' => $doubleClueGameType->id,
        //     ]);
        // }
    }
}
