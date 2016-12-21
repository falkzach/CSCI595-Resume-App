<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $skills = Auth::user()->skills;
        return response()->json([
            'skills' => $skills
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $skills = Skill::create($data);
        return response()->json([
            'skills' => $skills
        ]);
    }

    public function delete(Skill $skill)
    {
        $skill->delete();
        return response()->json(['id' => $skill->id]);
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->all();
        $skill->update($data);
        return response()->json([
            'skill' => $skill
        ]);
    }
}
