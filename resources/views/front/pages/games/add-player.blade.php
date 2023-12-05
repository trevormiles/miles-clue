@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('games.show', $game->id) }}" class="back-button">Back to game</a>
        <h1>Add Player</h1>
        <p>For game: <span class="font-semibold">{{ $game->name }}</span></p>

        <form method="POST" action="{{ route('games.addPlayer', $game->id) }}">
            @csrf
            @method('PATCH')

            <div class="mt-7">
                <label class="h2" for="player_id" class="block">Select Player:</label>
                <select
                    name="player_id"
                    id="player_id"
                    class="mt-1.5 w-full rounded-md border border-gray-200 py-2 px-4"
                    required
                >
                    <option value="" disabled selected>Select</option>
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->fullName() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-8">
                <h2>Select Cards:</h2>
                <div class="flex flex-col gap-1">
                    @foreach ($game->cardGamePlayers as $cardGamePlayer)
                        <div>
                            <input type="checkbox" id="card_{{ $cardGamePlayer->id }}" name="card_{{ $cardGamePlayer->id }}" value="{{ $cardGamePlayer->id }}">
                            <label class="ml-1" for="card_{{ $cardGamePlayer->id }}">{{ $cardGamePlayer->card->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn mt-8">Create</button>
        </form>
    </div>
@endsection