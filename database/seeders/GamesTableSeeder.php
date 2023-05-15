<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            'Match 1',
            'Match 2',
            'Match 3',
        ];

        foreach ($games as $game) {
            Game::create([
                'name' => $game,
            ]);
        }
    }
}
