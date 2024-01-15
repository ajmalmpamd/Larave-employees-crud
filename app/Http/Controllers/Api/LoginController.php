<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $credentials = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // return response()->json(['token' => $credentials]);
        if($credentials->fails()){
            return response()->json(['error' => 'Validation error']);
               
        }
        if (Auth::attempt(['email' => $request->get('email'),'password' => $request->get('password'),
        ])) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->accessToken;

            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
