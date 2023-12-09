<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\CardCategory;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();

        return view('front.pages.cards.index', [
            'cards' => $cards,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.cards.create', [
            'cardCategories' => CardCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $cardCategoryId = $request->input('card_category_id');

        Card::create(['name' => $name, 'card_category_id' => $cardCategoryId]);

        return redirect()->route('cards.index');
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
    public function edit(Card $card)
    {
        return view('front.pages.cards.edit', [
            'card' => $card,
            'cardCategories' => CardCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $name = $request->input('name');
        $cardCategoryId = $request->input('card_category_id');
        $card->name = $name;
        $card->card_category_id = $cardCategoryId;
        $card->save();

        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
