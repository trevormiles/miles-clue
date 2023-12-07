<div class="container mx-auto px-4 py-10">
    <a href="{{ route('games.show', $game->id) }}" class="back-button">Back to game</a>
    <h1>Card Checker</h1>
    <p>For game: <span class="font-semibold">{{ $game->name }}</span></p>

    <div class="mt-3">
        <label for="player" class="block font-semibold text-sm">Player:</label>
        <select
            id="player"
            class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
            wire:model="selectedPlayerId"
        >
            <option value="" disabled selected>Select</option>
            @foreach ($players as $player)
                <option value="{{ $player->id }}">{{ $player->fullName() }}</option>
            @endforeach
        </select>
        @if ($showPlayerRequiredError)
            <div>Field is required</div>
        @endif
    </div>

    @foreach ($cardsGroupedByCategory as $key => $category)
        <div class="mt-3">
            <label for="{{ $category['cardCategory']->name }}" class="block font-semibold text-sm">
                {{ $category['cardCategory']->name }}:
            </label>
            <select
                id="{{ $category['cardCategory']->name }}"
                class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                wire:model="selectedCard{{$key + 1}}"
            >
                <option value="" disabled selected>Select</option>
                @foreach ($category['cards'] as $card)
                    <option value="{{ $card->id }}">{{ $card->name }}</option>
                @endforeach
            </select>
            @php
                $iteration = $key + 1;
                $cardRequiredErrorVariable = "showCard{$iteration}RequiredError";
            @endphp
            @if ($$cardRequiredErrorVariable)
                <div>Field is required</div>
            @endif
        </div>
    @endforeach

    <div class="mt-3 flex justify-between check-type-quantity">
        <div>
            <label for="type" class="block font-semibold text-sm">Type of check:</label>
            <select
                id="type"
                class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                wire:model.live="selectedCheckType"
            >
                <option value="hasAtLeast1">Has at least 1</option>
                <option value="quantity">Quantity</option>
            </select>
        </div>
        @if ($selectedCheckType === "quantity")
            <div wire:model="selectedQuantity">{{ $selectedQuantity }}</div>
            <button wire:click="incrementSelectedQuantity">+</button>
            <button wire:click="decrementSelectedQuantity">-</button>
        @endif
        @if ($showCheckTypeRequiredError)
            <div>Field is required</div>
        @endif
    </div>
    @if ($showHasAtLeast1Success === true)
        <div>Correct has at least 1</div>
    @endif
    @if ($showQuantitySuccess === true)
        <div>Correct quantity</div>
    @endif
    @if ($showHasAtLeast1Failure === true)
        <div>Wrong has at least 1</div>
    @endif
    @if ($showQuantityFailure === true)
        <div>Wrong quantity</div>
    @endif
    <button wire:click="runCheck" class="btn mt-6">Run Check</button>

    @script
        <script>
            const successAudio = new Audio('/sounds/success.mp3');
            const failureAudio = new Audio('/sounds/failure.mp3');

            $wire.on('check-success', () => {
                successAudio.play();
            });

            $wire.on('check-failure', () => {
                failureAudio.play();
            });
        </script>
    @endscript
</div>
