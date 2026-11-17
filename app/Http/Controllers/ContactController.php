<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        \App\Models\Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan terkirim!');
    }
}
