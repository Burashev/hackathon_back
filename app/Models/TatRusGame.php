<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TatRusGame extends Model
{
    use HasFactory;

    protected $table = 'tat_rus_game';

    public function answers() {
        return $this->belongsToMany(Answer::class);
    }
}
