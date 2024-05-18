<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameType;
use App\Models\Card;
use App\Models\CardCategory;
use App\Models\CardGameType;
use App\Models\CardVariant;
use App\Models\CardVariantGameType;

class GameTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gameTypes = GameType::all();

        return view('front.pages.gameTypes.index', [
            'gameTypes' => $gameTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cardsGroupedByCategory = $this->getCardsGroupedByCategory();

        return view('front.pages.gameTypes.create', [
            'cardsGroupedByCategory' => $cardsGroupedByCategory,
            'cardVariants' => CardVariant::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');

        $gameType = GameType::create(['name' => $name]);

        foreach ($request->all() as $key => $value) {
            if (str_contains($key, 'card_')) {
                CardGameType::create([
                    'card_id' => $value,
                    'game_type_id' => $gameType->id,
                ]);
            } else if (str_contains($key, 'variant_')) {
                CardVariantGameType::create([
                    'card_variant_id' => $value,
                    'game_type_id' => $gameType->id,
                ]);
            }
        }

        return redirect()->route('gameTypes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameType $gameType)
    {
        $cardsGroupedByCategory = $this->getCardsGroupedByCategory();

        $selectedCards = [];

        foreach ($gameType->cardGameTypes as $cardGameType) {
            array_push($selectedCards, $cardGameType->card_id);
        }

        $selectedCardVariants = $gameType->cardVariants()->pluck("id")->toArray();

        return view('front.pages.gameTypes.edit', [
            'gameType' => $gameType,
            'cardsGroupedByCategory' => $cardsGroupedByCategory,
            'selectedCards' => $selectedCards,
            'cardVariants' => CardVariant::all(),
            'selectedCardVariants' => $selectedCardVariants,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GameType $gameType)
    {
        $name = $request->input('name');
        $gameType->name = $name;
        $gameType->save();

        $cardsInRequest = [];
        $cardVariantsInRequest = [];

        foreach ($request->all() as $key => $value) {
            if (str_contains($key, 'card_')) {
                array_push($cardsInRequest, $value);

                $cardGameType = CardGameType::where('card_id', $value)
                    ->where('game_type_id', $gameType->id)
                    ->first();

                // Add it if it doesn't already exist
                if (!$cardGameType) {
                    CardGameType::create([
                        'card_id' => $value,
                        'game_type_id' => $gameType->id,
                    ]);
                }
            } else if (str_contains($key, 'variant_')) {
                array_push($cardVariantsInRequest, $value);

                $cardVariantGameType = CardVariantGameType::where('card_variant_id', $value)
                    ->where('game_type_id', $gameType->id)
                    ->first();

                // Add it if it doesn't already exist
                if (!$cardVariantGameType) {
                    CardVariantGameType::create([
                        'card_variant_id' => $value,
                        'game_type_id' => $gameType->id,
                    ]);
                }
            }
        }

        // Delete the cards not in the request
        CardGameType::where('game_type_id', $gameType->id)
            ->whereNotIn('card_id', $cardsInRequest)
            ->delete();

        // Delete the card variants not in the request
        CardVariantGameType::where('game_type_id', $gameType->id)
            ->whereNotIn('card_variant_id', $cardVariantsInRequest)
            ->delete();

        return redirect()->route('gameTypes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getCardsGroupedByCategory(): array
    {
        $cards = Card::all();
        $cardCategories = CardCategory::all();

        $cardsGroupedByCategory = [];

        foreach ($cardCategories as $cardCategory) {
            array_push($cardsGroupedByCategory, [
                "cardCategory" => $cardCategory,
                "cards" => $cards->where("card_category_id", $cardCategory->id)->all(),
            ]);
        }

        return $cardsGroupedByCategory;
    }
}
