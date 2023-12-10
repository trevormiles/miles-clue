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
            <div class="text-red-700 mt-2 text-sm">Field is required</div>
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
                <div class="text-red-700 mt-2 text-sm">Field is required</div>
            @endif
        </div>
    @endforeach

    <div class="mt-3 flex justify-start items-end check-type-quantity">
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
            <div class="ml-3 bg-white border border-200 w-10 h-10 flex justify-center items-center rounded-md">
                <span>{{ $selectedQuantity }}</span>
            </div>
            <button wire:click="incrementSelectedQuantity" class="ml-3 w-10 h-10 flex justify-center items-center rounded-md bg-green-700 text-white">
                <span>+</span>
            </button>
            <button wire:click="decrementSelectedQuantity" class="ml-3 w-10 h-10 flex justify-center items-center rounded-md bg-red-700 text-white">
                <span>-</span>
            </button>
        @endif
        @if ($showCheckTypeRequiredError)
            <div class="text-red-700 mt-2 text-sm">Field is required</div>
        @endif
    </div>

    <div class="mt-5 mb-2 font-semibold">
        @if ($showHasAtLeast1Success === true)
            <div class="text-green-700 flex items-center gap-2">
                <x-icon-checkmark-circle class="w-8 h-auto" />
                <span>Has at least 1</span>
            </div>
        @endif
        @if ($showQuantitySuccess === true)
            <div class="text-green-700 flex items-center gap-2">
                <x-icon-checkmark-circle class="w-8 h-auto" />
                <span>Correct quantity</span>
            </div>
        @endif
        @if ($showHasAtLeast1Failure === true)
            <div class="text-red-700 flex items-center gap-2">
                <x-icon-close class="w-4 h-auto" />
                <span>Does not have at least 1</span>
            </div>
        @endif
        @if ($showQuantityFailure === true)
            <div class="text-red-700 flex items-center gap-2">
                <x-icon-close class="w-4 h-auto" />
                <span>Wrong quantity</span>
            </div>
        @endif
    </div>

    <button wire:click="runCheck" class="btn btn--full-width py-10 mt-4">Run Check</button>

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
