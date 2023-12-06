<?php

namespace Database\Seeders\Mock;

use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PlayerSeeder extends Seeder
{
    public function run()
    {
        $players = [
            [
                'first_name' => 'Trevor',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Natalie',
                'last_name' => 'Hart',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Mark',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Randy',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Sydney',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Mack',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Matt',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Michelle',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Daniel',
                'last_name' => 'Miles',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Player::insert($players);
    }
}
