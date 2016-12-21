<?php

namespace App\Http\Controllers;

use App\Reference;
use App\Resume;
use App\School;
use App\Skill;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function addSchool(Resume $resume, School $school)
    {
        $resume->schools()->attach($school->id);
        return response()->json(['resume' => $resume]);
    }

    public function removeSchool(Resume $resume, School $school)
    {
        $resume->schools()->detach($school->id);
        return response()->json(['resume' => $resume]);
    }

    public function addWork(Resume $resume, Work $work)
    {
        $resume->jobs()->attach($work->id);
        return response()->json(['resume' => $resume]);
    }

    public function removeWork(Resume $resume, Work $work)
    {
        $resume->jobs()->detach($work->id);
        return response()->json(['resume' => $resume]);
    }

    public function addSkill(Resume $resume, Skill $skill)
    {
        $resume->skills()->attach($skill->id);
        return response()->json(['resume' => $resume]);
    }

    public function removeSkill(Resume $resume, Skill $skill)
    {
        $resume->skills()->detach($skill->id);
        return response()->json(['resume' => $resume]);
    }

    public function addReference(Resume $resume, Reference $reference)
    {
        $resume->references()->attach($reference->id);
        return response()->json(['resume' => $resume]);
    }

    public function removeReference(Resume $resume, Reference $reference)
    {
        $resume->references()->detach($reference->id);
        return response()->json(['resume' => $resume]);
    }
}
