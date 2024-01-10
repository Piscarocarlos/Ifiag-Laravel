<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group API Authentification
 */
class AuthController extends Controller
{

    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Api for register
     *
     * @bodyParam name string required. The name of the user.Example : John Doe
     * @bodyParam email string required. The email of the user. Example: john@doe.com
     * @bodyParam password string required min:6. Example: 123456
     * @response {
     * "message": "Compte créé",
     * "access_token": "ohrpohjo",
     * "token_type": "Bearer",
     * "expired_at": "2023-04-04"
     * }
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->authService->create($request);

        $this->authService->createStudent($request, $user);
        // welcome email

        $tokenResult = $this->authService->createAccessToken($user);

        return $this->authService->buildResponse($tokenResult, "Compte créé avec succès");
    }
}
