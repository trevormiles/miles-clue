<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Game extends Model
{
    protected $fillable = [
        'name',
        'game_type_id'
    ];

    public function gameType()
    {
        return $this->belongsTo(GameType::class);
    }

    public function cardGamePlayers()
    {
        return $this->hasMany(CardGamePlayer::class);
    }

    public function players(): Collection
    {
        $players = collect();

        foreach ($this->cardGamePlayers as $cardGamePlayer) {
            if (!$players->contains('id', $cardGamePlayer->player->id)) {
                $players->push($cardGamePlayer->player);
            }
        }

        return $players;
    }

    public function playersShortDisplay(): string
    {
        $playerFirstNames = [];

        foreach ($this->players() as $player) {
            array_push($playerFirstNames, $player->first_name);
        }

        return implode(", ", $playerFirstNames);
    }
}
