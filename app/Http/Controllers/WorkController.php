<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $work = Auth::user()->jobs;
        return response()->json($work);
    }

    public function create()
    {
        $data = Input::all();
        $school = Work::create($data);
        return response()->json($school);
    }

    public function delete()
    {
        $id = Input::get('id');
        $school = Work::find($id)->delete();
        return response()->json(['id' => $id]);
    }


}
