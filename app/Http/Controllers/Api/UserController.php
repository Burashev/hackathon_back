<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
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
}
