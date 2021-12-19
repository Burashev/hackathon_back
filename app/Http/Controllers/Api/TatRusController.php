<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TatRusGame;
use Illuminate\Http\Request;

class TatRusController extends Controller
{
    public function getAnswers() {
        return TatRusGame::all()->first()->answers;
    }
}
