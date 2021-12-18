<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\GameResource;
use App\Models\Game;

class GameController extends BaseController
{
    public function getGames() {
        return $this->sendResponse('Successfully received games', GameResource::collection(Game::all()));
    }

}
