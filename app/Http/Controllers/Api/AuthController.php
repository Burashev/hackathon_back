<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;

class AuthController extends BaseController
{
    public function postLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors(), 400);
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->sendError('Unauthorised', ['error' => 'Unauthorised'], 401);
        }

        Auth::user()->update([
            'api_token' => Str::random(32)
        ]);

        return $this->sendResponse('Success sign in', UserResource::make(Auth::user()));
    }

    public function postRegister(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_repeat',
            'password_repeat' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors(), 400);
        }
        $avatar = new Avatar();

        $user = User::query()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'login' => Str::random(14),
            'api_token' => Str::random(32),
            'avatar' => $avatar->create(Str::random(2))->toBase64(),
        ]);

        return $this->sendResponse('User created', UserResource::make($user));
    }
}
