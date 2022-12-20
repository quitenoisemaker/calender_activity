<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\UserActivityAPIRequest;
use App\Http\Resources\GetUserActivityResource;

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
            return $this->sendSuccessResponse("success", ["result" => "Registered successfuly"]);
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

    public function getUserActivitiesAPI(UserActivityAPIRequest $request, Activity $activity)
    {
        # code...
        $user = Auth::user()->id;
        $from = $request->from_date;
        $to = $request->to_date;

        $result = $activity->getUserActivitiesOnDateRange($from, $to, $user);

        // return $result;
        return $this->sendSuccessResponse('success', GetUserActivityResource::collection($result));
    }
}
