<?php
declare(strict_types=1);
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function register(AuthRequest $request): JsonResponse
    {
         $data = $request->validated();
         $this->authService->register($data);
         return response()->json(['message' => 'User registered successfully'], 201);
    }


    public function login(Request $request) : JsonResponse
    {
        $credentials = $request->only(['email','password']);
        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token, 'user'=> auth()->user()], 200);
    }

    public function profile() : JsonResponse
    {
        return response()->json(['profile'  => auth()->user()], 200);
    }

}
