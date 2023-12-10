@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('games.index') }}" class="back-button">Back to all games</a>
        <div class="flex justify-between items-center">
            <h1 class="m-0">{{ $game->name }} <span class="font-medium">({{ $game->gameType->name }})</span></h1>
            <a href="{{ route('games.edit', $game->id) }}" class="bg-white py-4 px-4 rounded-md">
                <x-icon-pencil-icon class="w-4 h-auto text-green-700" />
            </a>
        </div>

        <div class="flex justify-between items-center mt-6 mb-4">
            <h2 class="mb-0">Players:</h2>
            <a href="{{ route('games.addPlayer', $game->id) }}" class="btn">Add Player</a>
        </div>

        <div class="flex flex-col gap-4">
            @if ($gamePlayers->count() > 0)
                @foreach ($gamePlayers as $player)
                    <div class="block rounded-lg p-4 bg-white w-full flex items-center">
                        <h3 class="mb-0">{{ $player->fullName() }}</h3>
                        <div class="ml-auto">Cards: {{ $player->cardsQuantityForGame($game->id) }}</div>
                        <form
                            method="POST"
                            action="{{ route('games.removePlayer', ['game' => $game->id, 'player' => $player->id]) }}"
                            class="flex justify-center items-center ml-6"
                        >
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-red-700">
                                <x-icon-trashcan class="w-4 h-auto" />
                            </button>
                        </form>
                    </div>
                @endforeach
            @else
                <div>There are no players yet.</div>
            @endif
        </div>

        <h2 class="mt-10">Cards:</h2>
        <p>Quantity of unclaimed cards: {{ $game->unclaimedCardsQuantity() }}</p>
        <a href="{{ route('games.cardChecker', $game->id) }}" class="btn mt-1">Go to Card Checker</a>
    </div>
@endsection