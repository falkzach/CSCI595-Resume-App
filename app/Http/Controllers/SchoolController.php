<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schools = Auth::user()->schools;
        return response()->json(['school' => $schools,]);
    }

    public function create()
    {
        $data = Input::all();
        $school = School::create($data);
        return response()->json([
            'school' => $school
        ]);
    }

    public function delete(School $school)
    {
        $school->delete();
        return response()->json(['id' => $school->id]);
    }

    public function update(School $school)
    {
        $data = Input::all();
        $school->update($data);
        return response()->json([
            'school' => $school
        ]);
    }
}
