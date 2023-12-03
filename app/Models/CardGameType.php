<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardGameType extends Model
{
    /** Pivot table to specify which cards correspond to a game type */

    protected $table = "card_game_type";

    protected $fillable = [
        'card_id',
        'game_type_id'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function gameType()
    {
        return $this->belongsTo(GameType::class);
    }
}
