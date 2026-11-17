<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function index()
    {
        $cv = Cv::first();

        return view('admin.cv.index', compact('cv'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:5120',
        ]);

        $this->replaceCv($request->file('cv'));

        return redirect()->route('admin.cv.index')
            ->with('success', '✅ CV berhasil diupload!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:5120',
        ]);

        $this->replaceCv($request->file('cv'));

        return redirect()->route('admin.cv.index')
            ->with('success', '✅ CV berhasil diperbarui!');
    }

    public function destroy()
    {
        $cv = Cv::first();

        if ($cv) {
            $this->deleteFile($cv->filename);
            $cv->delete();
        }

        return redirect()->route('admin.cv.index')
            ->with('success', '✅ CV berhasil dihapus!');
    }

    private function replaceCv($file)
    {
        $existing = Cv::first();

        if ($existing) {
            $this->deleteFile($existing->filename);
            $existing->delete();
        }

        $this->saveFile($file);
    }

    private function saveFile($file)
    {
        $dir = public_path('cv');

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        $file->move($dir, $filename);

        Cv::create([
            'filename' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    private function deleteFile($filename)
    {
        $path = public_path('cv/' . $filename);

        if ($filename && file_exists($path)) {
            unlink($path);
        }
    }
}