<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\TrueGameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class TrueGameController extends BaseController
{
    public function getGameData() {
        $game = Game::all()->first();
        return $this->sendResponse('games', TrueGameResource::collection($game->trueGames));
    }
}
