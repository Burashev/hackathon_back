<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function getUser(): \Illuminate\Http\JsonResponse
    {
        if (!Auth::check()) {
            $this->sendError('Unauthorized', [
                'error' => 'User is not found'
            ], 401);
        }
        return $this->sendResponse('User found', UserResource::make(Auth::user()));
    }

    public function changeUserFullname(Request $request) {
        if (!Auth::check()) {
            $this->sendError('Unauthorized', [
                'error' => 'User is not found'
            ], 401);
        }
        Auth::user()->update([
            'fullname' => $request->fullname
        ]);
        return $this->sendResponse('Successful change fullname', UserResource::make(Auth::user()));
    }
}
