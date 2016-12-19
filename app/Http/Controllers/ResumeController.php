<?php

namespace App\Http\Controllers;

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

    public function get()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
