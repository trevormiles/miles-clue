<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameType;
use Illuminate\Http\RedirectResponse;
use App\Models\CardGamePlayer;
use App\Models\Player;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();

        return view('front.pages.games.index', [
            'games' => $games,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.games.create', [
            'gameTypes' => GameType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $name = $request->input('name');
        $gameTypeID = $request->input('game_type_id');

        $game = Game::create(['name' => $name, 'game_type_id' => $gameTypeID]);

        foreach ($game->gameType->cards() as $card) {
            CardGamePlayer::create([
                'game_id' => $game->id,
                'card_id' => $card->id,
                'player_id' => null,
            ]);
        }

        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('front.pages.games.show', [
            'game' => $game,
            'gamePlayers' => $game->players(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('front.pages.games.edit', [
            'game' => $game,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $name = $request->input('name');
        $game->name = $name;
        $game->save();

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the form for adding a player to a game.
     */
    public function addPlayer(Game $game)
    {
        return view('front.pages.games.add-player', [
            'game' => $game,
            'players' => Player::all(),
            'cardsGroupedByCategory' => $game->gameType->cardsGroupedByCategory(),
        ]);
    }

    /**
     * Create the player/card/game relation
     */
    public function storePlayer(Request $request, Game $game): RedirectResponse
    {
        $playerID = $request->input('player_id');

        foreach ($request->all() as $key => $value) {
            if (str_contains($key, 'card_')) {
                $cardGamePlayer = CardGamePlayer::where("card_id", $value)->where("game_id", $game->id)->first();
                $cardGamePlayer->player_id = $playerID;
                $cardGamePlayer->save();
            }
        }

        return redirect()->route('games.show', $game->id);
    }

    /**
     * Remove the player from the game by setting player_id to null on the player/card/game relation
     */
    public function removePlayer(Game $game, Player $player): RedirectResponse
    {
        $cardGamePlayers = CardGamePlayer::where('game_id', $game->id)
            ->where('player_id', $player->id)
            ->get();

        foreach ($cardGamePlayers as $cardGamePlayer) {
            $cardGamePlayer->player_id = null;
            $cardGamePlayer->save();
        }

        return redirect()->route('games.show', $game->id);
    }

    /**
     * Display the card checker page
     */
    public function cardChecker(Game $game)
    {
        return view('front.pages.games.card-checker', [
            'game' => $game,
        ]);
    }
}
