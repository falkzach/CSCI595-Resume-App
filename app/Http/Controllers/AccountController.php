<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Validator;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        return response()->json([
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();
        $data = $request->all();

        if($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'message' => 'name and email are required!',
                'user' => $user,
            ]);
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        return response()->json([
            'user' => $user,
        ]);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Password must be 6 characters long!'
            ]);
        }

        $user = Auth::user();
        $data = $request->all();

        if($user->password !== $data['currentPassword'])
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Incorrect Password!'
            ]);
        }

        if($data['newPassword'] !== $data['confirmPassword'])
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Passwords did not match!'
            ]);
        }

        $user->forceFill([
            'password' => bcrypt($data['newPassword']),
            'remember_token' => Str::random(60),
        ])->save();
        Auth::login($user, true);
        return response()->json([
            'user' => $user,
        ]);
    }
}
