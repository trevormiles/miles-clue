@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('gameTypes.index') }}" class="back-button">Back to all game types</a>
        <h1 class="m-0">Edit Game Type</h1>

        <form method="POST" action="{{ route('gameTypes.update', $gameType->id) }}">
            @csrf
            @method('PATCH')

            <div class="mt-5">
                <label for="name" class="block">Name:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Name"
                    class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                    value="{{ $gameType->name }}"
                    required
                />
            </div>

            <div class="mt-5">
                <div>Select cards for game type:</div>
                <div class="flex flex-col gap-6 mt-2">
                    @foreach ($cardsGroupedByCategory as $category)
                        <div>
                            <h3>{{ $category['cardCategory']->name }}s</h3>
                            <div class="flex flex-col gap-1">
                                @foreach ($category['cards'] as $card)
                                    <div>
                                        <input
                                            type="checkbox"
                                            id="card_{{ $card->id }}"
                                            name="card_{{ $card->id }}"
                                            value="{{ $card->id }}"
                                            {{ (in_array($card->id, $selectedCards)) ? 'checked' : '' }}
                                        >
                                        <label class="ml-1" for="card_{{ $card->id }}">{{ $card->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8">
                <div>Select card variants for game type:</div>
                <div class="flex flex-col gap-1 mt-2">
                    @foreach ($cardVariants as $cardVariant)
                        <div>
                            <input
                                type="checkbox"
                                id="variant_{{ $cardVariant->id }}"
                                name="variant_{{ $cardVariant->id }}"
                                value="{{ $cardVariant->id }}"
                                {{ (in_array($cardVariant->id, $selectedCardVariants)) ? 'checked' : '' }}
                            >
                            <label class="ml-1" for="card_{{ $cardVariant->id }}">{{ $cardVariant->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn mt-8">Save</button>
        </form>
    </div>
@endsection