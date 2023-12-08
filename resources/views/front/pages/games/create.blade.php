@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('games.index') }}" class="back-button">Back to all games</a>
        <h1 class="m-0">Create New Game</h1>

        <form method="POST" action="{{ route('games.store') }}">
            @csrf

            <div class="mt-5">
                <label for="name" class="block">Name:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Name"
                    class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                    required
                />
            </div>
            <div class="mt-5">
                <label for="game_type_id" class="block">Card Selection:</label>
                <select
                    name="game_type_id"
                    id="game_type_id"
                    class="mt-1.5 w-full rounded-md border border-gray-200 py-2 px-4"
                    required
                >
                    @foreach ($gameTypes as $gameType)
                        <option value="{{ $gameType->id }}">{{ $gameType->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn mt-8">Create</button>
        </form>
    </div>
@endsection