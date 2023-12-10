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
                <div class="flex flex-col gap-6">
                    @foreach ($cardsGroupedByCategory as $category)
                        <div>
                            <h3>{{ $category['cardCategory']->name }}s</h3>
                            <div class="flex flex-col gap-1">
                                @foreach ($category['cards'] as $card)
                                    @if ($hasCardVariants)
                                        @foreach ($cardVariants as $cardVariant)
                                            <div>
                                                <input
                                                    type="checkbox"
                                                    id="card_{{ $card->id }}_{{ $cardVariant->id }}"
                                                    name="card_{{ $card->id }}_{{ $cardVariant->id }}"
                                                    value="card_{{ $card->id }}_{{ $cardVariant->id }}"
                                                >
                                                <label
                                                    class="ml-1"
                                                    for="card_{{ $card->id }}_{{ $cardVariant->id }}"
                                                >
                                                    {{ $card->name }} - {{ $cardVariant->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @else
                                        <div>
                                            <input
                                                type="checkbox"
                                                id="card_{{ $card->id }}"
                                                name="card_{{ $card->id }}"
                                                value="{{ $card->id }}"
                                            >
                                            <label class="ml-1" for="card_{{ $card->id }}">{{ $card->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn mt-8">Create</button>
        </form>
    </div>
@endsection