<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

    public function create()
    {
        $data = Input::all();
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

    public function update(Skill $skill)
    {
        $data = Input::all();
        $skill->update($data);
        return response()->json([
            'skill' => $skill
        ]);
    }
}
