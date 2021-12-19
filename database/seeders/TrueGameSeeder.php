<?php

namespace Database\Seeders;

use App\Models\TrueGame;
use Illuminate\Database\Seeder;

class TrueGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrueGame::query()->create([
            'question' => 'Китап',
            'answer' => 'Самолет',
            'correct' => 0,
            'game_id' => 1
        ]);

        TrueGame::query()->create([
            'question' => 'Куян',
            'answer' => 'Заяц',
            'correct' => 1,
            'game_id' => 1
        ]);

        TrueGame::query()->create([
            'question' => 'Кишер',
            'answer' => 'Морковь',
            'correct' => 1,
            'game_id' => 1
        ]);
        TrueGame::query()->create([
            'question' => 'Мәктәп',
            'answer' => 'Школа',
            'correct' => 1,
            'game_id' => 1
        ]);
        TrueGame::query()->create([
            'question' => 'Әни',
            'answer' => 'Папа',
            'correct' => 0,
            'game_id' => 1
        ]);
        TrueGame::query()->create([
            'question' => 'Кыш',
            'answer' => 'Лето',
            'correct' => 0,
            'game_id' => 1
        ]);
    }
}
