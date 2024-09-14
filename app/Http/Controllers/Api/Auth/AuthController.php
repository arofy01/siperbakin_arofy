<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'photo' => 'image|mimes:jpeg,png,jpg|max:5048',
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:users',
        'phone' => 'required|unique:users,phone',
        'password' => 'required|string|min:8',
        'level_id' => 'required',
        ]);

        if ($validator->fails()) {
        return response()->json($validator->errors());
        }

        $photo = $request->file('photo');
        if ($photo) {
        $fileName = time().'_'.$photo->getClientOriginalName();
        $filePath = $photo->storeAs('images/users', $fileName, 'public');
        }

        $phone_number = $request['phone_number'];
        if ($request['phone_number'][0] == '0') {
        $phone_number = substr($phone_number, 1);
        }

        if ($phone_number[0] == '8') {
        $phone_number = '62' . $phone_number;
        }

        $user = new user;
        $user->photo = $filePath ?? null;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $phone_number;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
        'data' => $user,
        'access_token' => $token,
        'token_type' => 'Bearer'
        ]);
    }


public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    throw ValidationException::withMessages([
        'email' => ['The provided credentials are incorrect.'],
    ]);
}

public function logout()
{
    auth()->user()->tokens()->delete();

    return response()->json(['message' => 'You have logged out']);
}


}



