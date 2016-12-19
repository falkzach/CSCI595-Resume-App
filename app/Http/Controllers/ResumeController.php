<?php

namespace App\Http\Controllers;

use App\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Auth::user()->resumes;
        return response()->json([
            'resumes' => $resumes
        ]);
    }

    public function get(Resume $resume)
    {
        return response()->json([
            'resume' => $resume
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $resume = Resume::create($data);
        return response()->json([
            'resume' => $resume
        ]);
    }

    public function update(Request $request, Resume $resume)
    {
        $data = $request->all();
        $resume->update($data);
        return response()->json([
            'resume' => $resume
        ]);
    }

    public function delete(Resume $resume)
    {
        $resume->delete();
        return response()->json(['id' => $resume->id]);
    }
}
