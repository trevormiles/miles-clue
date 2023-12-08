<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use Illuminate\Support\Collection;

class CardChecker extends Component
{
    public Game $game;
    public Collection $players;
    public array $cardsGroupedByCategory;
    public Collection $cardGamePlayers;

    // Selections
    public string $selectedPlayerId = "";
    public string $selectedCard1 = "";
    public string $selectedCard2 = "";
    public string $selectedCard3 = "";
    public string $selectedCheckType = "hasAtLeast1";
    public int $selectedQuantity = 0;

    // Validation errors
    public bool $showPlayerRequiredError = false;
    public bool $showCard1RequiredError = false;
    public bool $showCard2RequiredError = false;
    public bool $showCard3RequiredError = false;
    public bool $showCheckTypeRequiredError = false;

    // Success/Failure notifications
    public bool $showHasAtLeast1Success = false;
    public bool $showQuantitySuccess = false;
    public bool $showHasAtLeast1Failure = false;
    public bool $showQuantityFailure = false;

    public function mount(Game $game): void
    {
        $this->game = $game;
        $this->players = $game->players();
        $this->cardsGroupedByCategory = $game->gameType->cardsGroupedByCategory();
        $this->cardGamePlayers = $game->cardGamePlayers()->get();
    }

    public function incrementSelectedQuantity(): void
    {
        if ($this->selectedQuantity === 3) {
            return;
        }

        $this->selectedQuantity++;
    }

    public function decrementSelectedQuantity(): void
    {
        if ($this->selectedQuantity === 0) {
            return;
        }

        $this->selectedQuantity--;
    }

    public function runCheck(): void
    {
        $this->hideAllValidationErrors();
        $this->hideAllResultNotifications();

        if ($this->selectedPlayerId === "") {
            $this->showPlayerRequiredError = true;
            return;
        }

        if ($this->selectedCard1 === "") {
            $this->showCard1RequiredError = true;
            return;
        }

        if ($this->selectedCard2 === "") {
            $this->showCard2RequiredError = true;
            return;
        }

        if ($this->selectedCard3 === "") {
            $this->showCard3RequiredError = true;
            return;
        }

        if ($this->selectedCheckType === "") {
            $this->showCheckTypeRequiredError = true;
            return;
        }

        if ($this->selectedCheckType === "hasAtLeast1") {
            $this->runHasAtLeast1Check();
        } else {
            $this->runQuantityCheck();
        }
    }

    private function runHasAtLeast1Check(): void
    {
        $hasCard1 = $this->hasCardCheck($this->selectedCard1);
        $hasCard2 = $this->hasCardCheck($this->selectedCard2);
        $hasCard3 = $this->hasCardCheck($this->selectedCard3);

        if ($hasCard1 || $hasCard2 || $hasCard3) {
            $this->showHasAtLeast1Success = true;
            $this->dispatch('check-success');
        } else {
            $this->showHasAtLeast1Failure = true;
            $this->dispatch('check-failure');
        }
    }

    private function runQuantityCheck(): void
    {
        $userHasQuantity = 0;

        if ($this->hasCardCheck($this->selectedCard1)) {
            $userHasQuantity += 1;
        }

        if ($this->hasCardCheck($this->selectedCard2)) {
            $userHasQuantity += 1;
        }

        if ($this->hasCardCheck($this->selectedCard3)) {
            $userHasQuantity += 1;
        }

        if ($userHasQuantity === $this->selectedQuantity) {
            $this->showQuantitySuccess = true;
            $this->dispatch('check-success');
        } else {
            $this->showQuantityFailure = true;
            $this->dispatch('check-failure');
        }
    }

    private function hasCardCheck(string $selectedCard): bool
    {
        $hasCard = $this->cardGamePlayers->where('player_id', $this->selectedPlayerId)
            ->where('card_id', $selectedCard)
            ->first();

        return $hasCard ? true : false;
    }

    private function hideAllResultNotifications(): void
    {
        $this->showHasAtLeast1Success = false;
        $this->showQuantitySuccess = false;
        $this->showHasAtLeast1Failure = false;
        $this->showQuantityFailure = false;
    }

    private function hideAllValidationErrors(): void
    {
        $this->showPlayerRequiredError = false;
        $this->showCard1RequiredError = false;
        $this->showCard2RequiredError = false;
        $this->showCard3RequiredError = false;
        $this->showCheckTypeRequiredError = false;
    }

    public function render()
    {
        return view('livewire.card-checker');
    }
}
