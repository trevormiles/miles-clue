@extends('front.layouts.main')

@section('main-content')
    <div class="bg-gray-50">
        <div class="container mx-auto px-4 py-8 flex flex-col gap-4">
            @foreach ($games as $game)
                <a href="{{ route('games.show', $game->id) }}" class="block rounded-lg p-4 shadow-sm shadow-indigo-100 bg-white w-full">
                    <h3 class="text-xl font-bold">{{ $game->name }}</h3>
                    <p><span class="font-medium">Players:</span> {{ $game->playersShortDisplay() }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection