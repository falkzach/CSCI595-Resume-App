<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schools = Auth::user()->schools;
        return response()->json([
            'schools' => $schools
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
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

    public function update(Request $request, School $school)
    {
        $data = $request->all();
        $school->update($data);
        return response()->json([
            'school' => $school
        ]);
    }
}
