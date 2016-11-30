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
        return response()->json($schools);
    }

    public function create()
    {
        $data = Input::all();
        $school = School::create($data);
        return response()->json($school);
    }

    public function delete()
    {
        $id = Input::get('id');
        $school = School::find($id)->delete();
        return response()->json(['id' => $id]);
    }


}
