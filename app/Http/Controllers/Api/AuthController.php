<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group API Authentification
 */
class AuthController extends Controller
{
    /**
     * Api for register
     *
     * @bodyParam name string required. The name of the user.Example : John Doe
     * @bodyParam email string required. The email of the user. Example: john@doe.com
     * @bodyParam password string required min:6. Example: 123456
     * @response {
     * 'message': 'Compte créé',
     * 'access_token': "ohrpohjo",
     * 'token_type': 'Bearer',
     * 'expired_at: '2023-04-04'
     * }
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // welcome email

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();

        return response()->json([
            'message'  => 'Compte créé avec succès',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => $tokenResult->token->expires_at
        ]);
    }
}
