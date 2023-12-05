<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Player extends Model
{
    protected $fillable = [
        'first_name',
        'last_name'
    ];

    public function fullName(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function cardGamePlayers()
    {
        return $this->hasMany(CardGamePlayer::class);
    }

    public function cardsForGame(int $gameID): Collection
    {
        return $this->cardGamePlayers()->where('game_id', $gameID)->get();
    }

    public function cardsQuantityForGame(int $gameID): int
    {
        return $this->cardsForGame($gameID)->count();
    }
}
