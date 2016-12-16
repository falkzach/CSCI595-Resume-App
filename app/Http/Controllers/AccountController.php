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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $this->validate($request, [

        ]);

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
            'currentPassword' => 'required|max:255',
            'newPassword' => 'required|email|max:255|unique:users',
            'confirmPassword' => 'required|min:6|confirmed',
        ]);

        $data = Input::all();
        $user = Auth::user();

        $user->forceFill([
            'password' => bcrypt($data['password']),
            'remember_token' => Str::random(60),
        ])->save();

        Auth::login($user, true);
        return response()->json($user);
    }

}
