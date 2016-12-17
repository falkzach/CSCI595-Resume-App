<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        return response()->json($user);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $data = Input::all();
        $user = Auth::user();

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        return response()->json($user);
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'currentPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6',
        ]);

        $data = Input::all();
        $user = Auth::user();

        if($user->password !== $data['currentPassword'])
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Incorrect Password!'
            ], 500);
        }

        if($data['newPassword'] !== $data['confirmPassword'])
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Passwords did not match!'
            ], 500);
        }

        $user->forceFill([
            'password' => bcrypt($data['newPassword']),
            'remember_token' => Str::random(60),
        ])->save();
        Auth::login($user, true);
        return response()->json($user, 200);
    }

}
