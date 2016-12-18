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
        $work = Work::create($data);
        return response()->json([
            'work' => $work
        ]);
    }

    public function delete(Work $work)
    {
        $work->delete();
        return response()->json(['id' => $work->id]);
    }

    public function update(Work $work)
    {

    }


}
