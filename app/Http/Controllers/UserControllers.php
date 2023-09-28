<?php

namespace App\Http\Controllers;

use App\Http\Request\Auth\LoginUserRequest;
use App\Http\Request\Auth\RegisterUserRequest;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserControllers extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $user = $this->authService->register($data);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$user]);
    }

    public function login(LoginUserRequest $request): Response
    {
        $credential = $request->validated();

        if (!User::where('login_id', '=', $credential['login_id'])->exists()) {
            return $this->httpUnauthorized(trans('errors.login_id_invalid'));
        }

        if (!Auth::attempt($credential)) {
            return $this->httpUnauthorized(trans('errors.unauthenticated'));
        }

        Auth::user()->tokens()->delete();
        $token = Auth::user()->createToken('auth_token')->plainTextToken;

        return $this->httpOk($this->responseUserWithToken($token, Auth::user()));
    }

}
