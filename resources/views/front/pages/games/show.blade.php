@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('games.index') }}" class="back-button">Back to all games</a>
        <h1 class="m-0">{{ $game->name }}</h1>

        <div class="flex justify-between items-center mt-6 mb-4">
            <h2 class="mb-0">Players:</h2>
            <a href="{{ route('games.addPlayer', $game->id) }}" class="btn">Add Player</a>
        </div>

        <div class="flex flex-col gap-4">
            @if ($gamePlayers->count() > 0)
                @foreach ($gamePlayers as $player)
                    <div class="block rounded-lg p-4 bg-white w-full flex justify-between items-center">
                        <h3 class="mb-0">{{ $player->fullName() }}</h3>
                        <div>Cards: {{ $player->cardsQuantityForGame($game->id) }}</div>
                    </div>
                @endforeach
            @else
                <div>There are no players yet.</div>
            @endif
        </div>

        <h2 class="mt-10">Cards:</h2>
        <p>Quantity of unclaimed cards: {{ $game->unclaimedCardsQuantity() }}</p>
        <a href="#" class="btn mt-1">Go to Card Checker</a>
    </div>
@endsection