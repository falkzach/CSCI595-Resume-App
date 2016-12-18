<?php

namespace App\Http\Controllers;

use App\Reference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ReferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reference = Auth::user()->references;
        return response()->json([
            'references' => $reference
        ]);
    }

    public function create()
    {
        $data = Input::all();
        $references = Reference::create($data);
        return response()->json([
            'references' => $references
        ]);
    }

    public function delete(Reference $reference)
    {
        $reference->delete();
        return response()->json(['id' => $reference->id]);
    }

    public function update(Reference $reference)
    {
        $data = Input::all();
        $reference->update($data);
        return response()->json([
            'reference' => $reference
        ]);
    }
}
