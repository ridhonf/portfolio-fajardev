<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    public function download()
    {
        $user = User::first();

        $pdf = Pdf::loadView('cv.pdf', compact('user'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('CV-' . str_replace(' ', '-', $user->name) . '.pdf');
    }

    public function edit()
    {
        $user = User::first();
        return view('admin.cv.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::first();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'bio' => 'nullable|string',
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
            'skills' => 'nullable|string',
            'tools' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $data = $request->only([
            'name', 'email', 'phone', 'location', 'title', 'birth_date',
            'bio', 'education', 'experience', 'skills', 'tools'
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo && file_exists(public_path('img/' . $user->profile_photo))) {
                unlink(public_path('img/' . $user->profile_photo));
            }

            $image = $request->file('profile_photo');
            $filename = 'profile_' . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $filename);
            $data['profile_photo'] = $filename;
        }

        $user->update($data);

        return redirect()->route('admin.cv.edit')
            ->with('success', '✅ Data CV berhasil diperbarui!');
    }
}