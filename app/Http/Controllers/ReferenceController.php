<?php

namespace App\Http\Controllers;

use App\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create(Request $request)
    {
        $data = $request->all();
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

    public function update(Request $request, Reference $reference)
    {
        $data = $request->all();
        $reference->update($data);
        return response()->json([
            'reference' => $reference
        ]);
    }
}
