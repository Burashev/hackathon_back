<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\StatisticResource;
use App\Http\Resources\UserResource;
use App\Models\GamesStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Avatar;

class UserController extends BaseController
{
    public function getUser(): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse('User found', UserResource::make(Auth::user()));
    }

    public function changeUserFullname(Request $request)
    {
        $avatar = new Avatar();
        Auth::user()->update([
            'fullname' => $request->fullname,
            'avatar' => $avatar->create($request->fullname)
        ]);
        return $this->sendResponse('Successful change fullname', UserResource::make(Auth::user()));
    }

    public function getUserStatistic()
    {
        return $this->sendResponse('Successful get statistic', StatisticResource::collection(Auth::user()->statistic));
    }

    public function postUserStatistic(Request $request)
    {
        Auth::user()->statistic()->save(new GamesStatistic([
                'game_id' => $request->game_id,
                'score' => $request->score,
                'score_max' => $request->score_max]
        ));
        return $this->sendResponse('Successful add statistic', StatisticResource::collection(Auth::user()->statistic));
    }
}
