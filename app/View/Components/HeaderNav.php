<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeaderNav extends Component
{
    public array $links;

    public function __construct()
    {
        $this->links = [
            [
                'title' => 'Games',
                'href' => route('games.index'),
            ],
            [
                'title' => 'Players',
                'href' => route('players.index'),
            ],
            [
                'title' => 'Cards',
                'href' => route('cards.index'),
            ],
            [
                'title' => 'Game Types',
                'href' => route('gameTypes.index'),
            ]
        ];
    }

    public function render()
    {
        return view('components.header-nav');
    }
}
