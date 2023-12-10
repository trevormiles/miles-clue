@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="m-0">Games</h1>
            <a href="{{ route('games.create') }}" class="btn">New Game</a>
        </div>
        <div class="flex flex-col gap-4">
            @foreach ($games as $game)
                <a href="{{ route('games.show', $game->id) }}" class="block rounded-lg p-4 bg-white w-full">
                    <h3>{{ $game->name }} <span class="font-medium">({{ $game->gameType->name }})</span></h3>
                    <p class="mb-0"><span class="font-medium">Players:</span> {{ $game->playersShortDisplay() }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection