<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();

        return view('front.pages.players.index', [
            'players' => $players,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.pages.players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        Player::create(['first_name' => $firstName, 'last_name' => $lastName]);

        return redirect()->route('players.index');
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
    public function edit(Player $player)
    {
        return view('front.pages.players.edit', [
            'player' => $player,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $player->first_name = $firstName;
        $player->last_name = $lastName;
        $player->save();

        return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
