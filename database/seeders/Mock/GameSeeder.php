<?php

namespace Database\Seeders\Mock;

use Illuminate\Database\Seeder;
use App\Models\GameType;
use App\Models\Game;
use App\Models\CardGamePlayer;
use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class GameSeeder extends Seeder
{
    public function run()
    {
        $singleClueGameType = GameType::where('name', 'Single')->first();
        $doubleClueGameType = GameType::where('name', 'Double')->first();

        $games = [
            [
                'name' => 'Nov. 27th, 2023',
                'game_type_id' => $singleClueGameType->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Nov. 15th, 2023',
                'game_type_id' => $doubleClueGameType->id,
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
                'game_type_id' => $doubleClueGameType->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Game::insert($games);

        // Create card assignments to players for each game
        foreach (Game::all() as $game) {
            $playersCount = rand(3, Player::count());
            $players = Player::inRandomOrder()->limit($playersCount)->get();

            // Create the cardGamePlayers for the game with the player_id temporarily set to null
            foreach ($game->gameType->cards() as $card) {
                if ($game->gameType->hasCardVariants()) {
                    foreach ($game->gameType->cardVariants() as $variant) {
                        CardGamePlayer::create([
                            'card_id' => $card->id,
                            'game_id' => $game->id,
                            'player_id' => null,
                            'card_variant_id' => $variant->id,
                        ]);
                    }
                } else {
                    CardGamePlayer::create([
                        'card_id' => $card->id,
                        'game_id' => $game->id,
                        'player_id' => null,
                        'card_variant_id' => null,
                    ]);
                }
            }

            $cardGamePlayers = CardGamePlayer::where('game_id', $game->id)->get();
            $cardGamePlayersCount = (int) $cardGamePlayers->count() - 3;

            $cardsCountPerPlayer = (int) floor($cardGamePlayersCount / $playersCount);
            $extraUnevenCardsCount = $cardGamePlayersCount % $playersCount;

            foreach ($players as $playerIndex => $player) {
                foreach (range(1, $cardsCountPerPlayer) as $index) {
                    $cardGamePlayers = $this->assignPlayerToCardGamePlayer($cardGamePlayers, $player);
                }
            }

            // Distribute the extra uneven cards out randomly amongst the players
            if ($extraUnevenCardsCount > 0) {
                foreach (range(1, $extraUnevenCardsCount) as $index) {
                    $cardGamePlayers = $this->assignPlayerToCardGamePlayer($cardGamePlayers, $players->random());
                }
            }
        }
    }

    private function assignPlayerToCardGamePlayer(Collection $cardGamePlayers, Player $player): Collection
    {
        // Select random one from collection
        $cardGamePlayer = $cardGamePlayers->random();

        // Assign it the player id
        $cardGamePlayer->player_id = $player->id;
        $cardGamePlayer->save();

        // Filter it out from collection
        return $cardGamePlayers->filter(function ($item) use ($cardGamePlayer) {
            return $item->id !== $cardGamePlayer->id;
        });
    }
}
