<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::query()->create([
            'title' => 'Верно не верно'
        ]);

        Game::query()->create([
            'title' => 'С татарского на русский'
        ]);

        Game::query()->create([
            'title' => 'С русского на татарский'
        ]);
    }
}
