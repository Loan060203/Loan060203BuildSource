<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Request\Auth\LoginUserRequest;
use App\Http\Request\Auth\RegisterUserRequest;
use App\Http\Resources\Staff\StaffResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login', 'register');
    }

    public function register(RegisterUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = new User();
        $user->login_id = $request->input('login_id');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'Registration successful'], 201);
    }

    public function login(LoginUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->only('login_id', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login successful'], 200);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }


}
