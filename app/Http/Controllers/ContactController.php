<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required',
            'comment' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'message' => 'name, email, subject, and comment are required!',
            ]);
        }

        $contact = Contact::create($request->all());

        return response()->json([
            'contact' => $contact
        ]);
    }
}
