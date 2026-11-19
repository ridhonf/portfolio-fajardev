<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(12);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_id' => 'required|string|max:255',
            'description_en' => 'required',
            'description_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'technologies' => 'nullable|string',
            'features' => 'nullable|string',
        ]);

        $data = $request->only(['demo_link', 'github_link', 'technologies', 'features']);
        
        $data['title'] = [
            'en' => $request->title_en,
            'id' => $request->title_id,
        ];
        
        $data['description'] = [
            'en' => $request->description_en,
            'id' => $request->description_id,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('projects'), $filename);
            $data['image'] = $filename;
        }

        // Process technologies (comma-separated)
        if (!empty($request->technologies)) {
            $data['technologies'] = array_map('trim', explode(',', $request->technologies));
        }

        // Process features (newline-separated)
        if (!empty($request->features)) {
            $data['features'] = array_map('trim', explode("\n", $request->features));
            $data['features'] = array_filter($data['features']); // remove empty lines
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
                         ->with('success', '✅ Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_id' => 'required|string|max:255',
            'description_en' => 'required',
            'description_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'technologies' => 'nullable|string',
            'features' => 'nullable|string',
        ]);

        $data = $request->only(['demo_link', 'github_link', 'technologies', 'features']);
        
        $data['title'] = [
            'en' => $request->title_en,
            'id' => $request->title_id,
        ];
        
        $data['description'] = [
            'en' => $request->description_en,
            'id' => $request->description_id,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($project->image && file_exists(public_path('projects/' . $project->image))) {
                unlink(public_path('projects/' . $project->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('projects'), $filename);
            $data['image'] = $filename;
        }

        // Process technologies (comma-separated)
        if (!empty($request->technologies)) {
            $data['technologies'] = array_map('trim', explode(',', $request->technologies));
        } elseif ($request->has('technologies')) {
            $data['technologies'] = [];
        }

        // Process features (newline-separated)
        if (!empty($request->features)) {
            $data['features'] = array_map('trim', explode("\n", $request->features));
            $data['features'] = array_filter($data['features']);
        } elseif ($request->has('features')) {
            $data['features'] = [];
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
                         ->with('success', '✅ Project berhasil diupdate!');
    }

    public function destroy(Project $project)
    {
        if ($project->image && file_exists(public_path('projects/' . $project->image))) {
            unlink(public_path('projects/' . $project->image));
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', '✅ Project berhasil dihapus!');
    }
}