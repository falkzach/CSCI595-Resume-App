<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = Auth::user()->jobs;
        return response()->json([
            'jobs' => $jobs
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $work = Work::create($data);
        return response()->json([
            'job' => $work
        ]);
    }

    public function delete(Work $work)
    {
        $work->delete();
        return response()->json(['id' => $work->id]);
    }

    public function update(Request $request, Work $work)
    {
        $data = $request->all();
        $work->update($data);
        return response()->json([
            'job' => $work
        ]);
    }


}
