<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\UserBasicResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user  = Auth::user();
            $token = $user->createToken('Personal Access Token');

            return $this->response('Succcessfully logged in.', [
                'user'  => new UserBasicResource($user),
                'token' => $token->plainTextToken
            ], 201);
        }

        return $this->response('The provided credentials do not match our records.', $request->all(), 402);
    }
}
