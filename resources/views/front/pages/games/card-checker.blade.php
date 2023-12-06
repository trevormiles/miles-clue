@extends('front.layouts.main')

@section('main-content')
    <div class="container mx-auto px-4 py-10">
        <a href="{{ route('games.show', $game->id) }}" class="back-button">Back to game</a>
        <h1>Card Checker</h1>
        <p>For game: <span class="font-semibold">{{ $game->name }}</span></p>

        <div class="mt-3">
            <label for="player" class="block font-semibold text-sm">Player:</label>
            <select
                data-player
                id="player"
                class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
            >
                <option value="" disabled selected>Select</option>
                @foreach ($players as $player)
                    <option value="{{ $player->id }}">{{ $player->fullName() }}</option>
                @endforeach
            </select>
        </div>

        @foreach ($cardsGroupedByCategory as $category)
            <div class="mt-3">
                <label for="{{ $category['cardCategory']->name }}" class="block font-semibold text-sm">
                    {{ $category['cardCategory']->name }}:
                </label>
                <select
                    data-card
                    id="{{ $category['cardCategory']->name }}"
                    class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                >
                    <option value="" disabled selected>Select</option>
                    @foreach ($category['cards'] as $card)
                        <option value="{{ $card->id }}">{{ $card->name }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach

        <div class="mt-3 flex justify-between check-type-quantity">
            <div>
                <label for="type" class="block font-semibold text-sm">Type of check:</label>
                <select
                    data-check-type
                    name="type"
                    id="type"
                    class="mt-1 w-full rounded-md border border-gray-200 py-2 px-4"
                >
                    <option value="hasAtLeast1" selected>Has at least 1</option>
                    <option value="quantity">Quantity</option>
                </select>
            </div>
            <div data-display-quantity>0</div>
            <button data-increment-quantity>+</button>
            <button data-decrement-quantity>-</button>
        </div>

        <button data-check-btn class="btn mt-6">Run Check</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkBtn = document.querySelector("[data-check-btn]");
            checkBtn.addEventListener("click", function() {
                checkSelection();
            });
        }); 

        function checkSelection() {
            const playerField = document.querySelector("[data-player]");
            const cardFields = document.querySelectorAll("[data-card]");
            const typeField = document.querySelector("[data-check-type]");

            const successAudio = new Audio('sounds/success.mp3');
            const failureAudio = new Audio('sounds/failure.mp3');
            const success = false;
            const failure = false;

            const displayQuantity = 0;

            if (typeField.value === 'hasAtLeast1') {
                if (
                    gameData[selectedPlayer.value].suspects.includes(selectedCard1.value)
                    || gameData[selectedPlayer.value].weapons.includes(selectedCard2.value)
                    || gameData[selectedPlayer.value].rooms.includes(selectedCard3.value)
                ) {
                    successAudio.play();
                    success.value = true;
                    failure.value = false;
                } else {
                    failureAudio.play();
                    success.value = false;
                    failure.value = true;
                }
                displayQuantity.value = null;
            } else {
                let userQuantity = 0;

                if (gameData[selectedPlayer.value].suspects.includes(selectedCard1.value)) {
                userQuantity = userQuantity + 1;
                }

                if (gameData[selectedPlayer.value].weapons.includes(selectedCard2.value)) {
                userQuantity = userQuantity + 1;
                }

                if (gameData[selectedPlayer.value].rooms.includes(selectedCard3.value)) {
                userQuantity = userQuantity + 1;
                }

                displayQuantity.value = userQuantity;
                success.value = false;
                failure.value = false;
            }
        }
    </script>
@endsection