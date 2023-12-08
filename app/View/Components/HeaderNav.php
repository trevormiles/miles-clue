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
                'title' => 'Players',
                'href' => '/',
            ]
        ];
    }

    public function render()
    {
        return view('components.header-nav');
    }
}
