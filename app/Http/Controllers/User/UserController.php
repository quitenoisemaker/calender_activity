<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    //

    public function userRegisterAPI(UserRegisterRequest $request, User $user)
    {
        //
        try {
            $validatedData = $request->validated();
            $validatedData['password'] = bcrypt($validatedData['password']);
            $user->createUser($validatedData);
            return $this->sendSuccessResponse("success", "Registered successfuly");
        } catch (\Throwable $th) {
            return $this->sendErrorResponse("error", $th->getMessage());
        }
    }

    public function userLoginAPI(UserLoginRequest $request, User $user)
    {
        //
        $validatedData = $request->validated();
        if (!Auth::attempt($validatedData)) {
            return $this->sendErrorResponse("error", "invalid credentials");
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return $this->sendSuccessResponse("success", ['user' => auth()->user(), 'access_token' => $accessToken]);
    }
}
