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
        $singleClueCards = Card::all();

        foreach ($singleClueCards as $card) {
            CardGameType::create([
                'card_id' => $card->id,
                'game_type_id' => $singleClueGameType->id,
            ]);
        }
    }
}
