<?php

namespace Database\Seeders\Mock;

use Illuminate\Database\Seeder;
use App\Models\GameType;
use App\Models\Game;
use App\Models\CardGamePlayer;
use App\Models\Player;
use Illuminate\Support\Carbon;

class GameSeeder extends Seeder
{
    public function run()
    {
        $singleClueGameType = GameType::where('name', 'single')->first();
        $games = [
            [
                'name' => 'Nov. 27th, 2023',
                'game_type_id' => $singleClueGameType->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nov. 15th, 2023',
                'game_type_id' => $singleClueGameType->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Dec. 26th, 2022',
                'game_type_id' => $singleClueGameType->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Dec. 21st, 2022',
                'game_type_id' => $singleClueGameType->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Game::insert($games);

        // Create card assignments to players for each game
        foreach (Game::all() as $game) {
            $playersCount = rand(3, Player::count());
            $players = Player::inRandomOrder()->limit($playersCount)->get();
            $cards = $game->gameType->cards();
            $cardsCount = count($cards) - 3;

            $cardsCountPerPlayer = (int) floor($cardsCount / $playersCount);
            $lastPlayerExtraCardsCount = $cardsCount % $cardsCountPerPlayer;
            $availableCards = $cards->pluck('id')->all();

            foreach ($players as $playerIndex => $player) {
                foreach (range(1, $cardsCountPerPlayer) as $index) {
                    $cardIndex = rand(0, count($availableCards) - 1);

                    CardGamePlayer::create([
                        'card_id' => $availableCards[$cardIndex],
                        'game_id' => $game->id,
                        'player_id' => $player->id,
                    ]);

                    unset($availableCards[$cardIndex]);
                    $availableCards = array_values($availableCards);
                }

                // If this is the last player, assign the extra uneven cards
                if ($playerIndex === $playersCount - 1 && $lastPlayerExtraCardsCount > 0) {
                    foreach (range(1, $lastPlayerExtraCardsCount) as $index) {
                        $cardIndex = rand(0, count($availableCards) - 1);

                        CardGamePlayer::create([
                            'card_id' => $availableCards[$cardIndex],
                            'game_id' => $game->id,
                            'player_id' => $player->id,
                        ]);
    
                        unset($availableCards[$cardIndex]);
                        $availableCards = array_values($availableCards);
                    }
                }
            }

            // Create records for the unclaimed cards (in the packet) not assigned to any player
            foreach ($availableCards as $card) {
                $cardIndex = rand(0, count($availableCards) - 1);

                CardGamePlayer::create([
                    'card_id' => $availableCards[$cardIndex],
                    'game_id' => $game->id,
                    'player_id' => null,
                ]);

                unset($availableCards[$cardIndex]);
                $availableCards = array_values($availableCards);
            }
        }
    }
}
