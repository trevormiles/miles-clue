<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameType;
use App\Models\CardVariantGameType;
use App\Models\CardVariant;

class CardVariantGameTypeSeeder extends Seeder
{
    public function run()
    {
        $doubleClueGameType = GameType::where('name', 'Double')->first();

        $cardVariantOld = CardVariant::where('name', 'Old')->first();
        $cardVariantNew = CardVariant::where('name', 'New')->first();

        CardVariantGameType::insert([
            ['card_variant_id' => $cardVariantNew->id, 'game_type_id' => $doubleClueGameType->id],
            ['card_variant_id' => $cardVariantOld->id, 'game_type_id' => $doubleClueGameType->id],
        ]);
    }
}
