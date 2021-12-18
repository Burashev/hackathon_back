<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamesStatistic extends Model
{
    use HasFactory;
    protected $fillable = ['game_id', 'score', 'score_max'];
    protected $table = 'games_statistic';

    public function game() {
        return $this->belongsTo(Game::class);
    }
}
