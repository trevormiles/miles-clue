<?php

namespace Database\Seeders\Mock;

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run()
    {
        $players = [
            [
                'first_name' => 'Trevor',
                'last_name' => 'Miles',
            ],
            [
                'first_name' => 'Natalie',
                'last_name' => 'Hart',
            ],
            [
                'first_name' => 'Mark',
                'last_name' => 'Miles',
            ],
            [
                'first_name' => 'Randy',
                'last_name' => 'Miles',
            ],
            [
                'first_name' => 'Sydney',
                'last_name' => 'Miles',
            ],
            [
                'first_name' => 'Matt',
                'last_name' => 'Miles',
            ],
            [
                'first_name' => 'Michelle',
                'last_name' => 'Miles',
            ]
        ];

        Player::insert($players);
    }
}
