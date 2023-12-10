<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardVariantGameType extends Model
{
    /** Pivot table to specify which card variants correspond to a game type */

    protected $table = "card_variant_game_type";

    protected $fillable = [
        'card_variant_id',
        'game_type_id'
    ];

    public function cardVariant()
    {
        return $this->belongsTo(CardVariant::class);
    }

    public function gameType()
    {
        return $this->belongsTo(GameType::class);
    }
}
