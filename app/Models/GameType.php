<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class GameType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function cardGameTypes()
    {
        return $this->hasMany(CardGameType::class);
    }

    public function cards(): Collection
    {
        $cards = collect();

        foreach ($this->cardGameTypes as $cardGameType) {
            $cards->push($cardGameType->card);
        }

        return $cards;
    }

    public function cardsGroupedByCategory(): array
    {
        $cards = $this->cards();
        $cardCategories = CardCategory::all();

        $result = [];

        foreach ($cardCategories as $cardCategory) {
            array_push($result, [
                "cardCategory" => $cardCategory,
                "cards" => $cards->where("card_category_id", $cardCategory->id)->all(),
            ]);
        }

        return $result;
    }
}
