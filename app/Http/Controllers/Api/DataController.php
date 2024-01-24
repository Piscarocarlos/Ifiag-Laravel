<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function users()
    {
        return response()->json([
            'data' => new UserCollection(User::all())
        ]);
    }
}
