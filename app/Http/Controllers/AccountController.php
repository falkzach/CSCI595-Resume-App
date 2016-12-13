<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Validation\Validator;
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

    public function index()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    public function update()
    {
        $data = Input::all();
        $user = Auth::user();

        $user->forceFill([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => Str::random(60),
        ])->save();

//        dd($user);

        Auth::login($user, true);

        return response()->json($user);
    }

}
