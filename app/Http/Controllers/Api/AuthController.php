<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }

    public function register(Request $request)
    {
        if ($request->image) {
            $validator = Validator::make($request->all(), [
                'full_name' => ['required', 'string'],
                'username' => ['required', 'min:6', 'max:16'],
                'image' => ['required', 'mimes:png,jpg'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'min:8', 'max:16'],
            ]);

            if ($validator->fails()) {
                return response($validator->messages(), 422);
            } else {
                $image = $request->file('image');
                $imageUrl = Storage::disk('public')->putFile('User', $image);
                $user = User::create([
                    'full_name' => $request->full_name,
                    'username' => $request->username,
                    'gender' => $request->gender ? 1 : 0,
                    'image' => $imageUrl,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                $user->assignRole('user');

                return response()->json([
                    "message" => "success create new account",
                    "user" => new UserResource($user),
                ]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'full_name' => ['required', 'string'],
                'username' => ['required', 'min:6', 'max:16'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'min:8', 'max:16'],
            ]);

            if ($validator->fails()) {
                return response($validator->messages(), 422);
            } else {
                $user = User::create([
                    'full_name' => $request->full_name,
                    'username' => $request->username,
                    'gender' => $request->gender ? 1 : 0,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                $user->assignRole('user');

                return response()->json([
                    "message" => "success create new account",
                    "user" => new UserResource($user),
                ]);
            }
        }
    }
}
