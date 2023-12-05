<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardGamePlayer extends Model
{
    /** Pivot table to specify which cards are assigned to which players for a game */

    protected $table = "card_game_player";

    protected $fillable = [
        'card_id',
        'game_id',
        'player_id'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
