<?php

namespace App\Services\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function create(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function createAccessToken(User $user)
    {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();

        return $tokenResult;
    }

    public function buildResponse($token, string $message)
    {
        return response()->json([
            'message'  => $message,
            'access_token' => $token->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => $token->token->expires_at
        ]);
    }

    public function createStudent($request, $user)
    {
        $student = new Student();
        $student->user_id = $user->id;
        $student->filiere = $request->filiere;

        $student->save();

        return $student;
    }
}
