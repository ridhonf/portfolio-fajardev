<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->paginate(12);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateTestimonial($request);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['avatar'] = $this->saveAvatar($request);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $this->validateTestimonial($request);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $newAvatar = $this->saveAvatar($request);
        if ($newAvatar !== null) {
            $validated['avatar'] = $newAvatar;
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->deleteAvatar($testimonial->avatar);

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil dihapus.');
    }

    private function validateTestimonial(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);
    }

    private function saveAvatar(Request $request): ?string
    {
        if (! $request->hasFile('avatar')) {
            return null;
        }

        $dir = public_path('testimonials');
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $avatar = $request->file('avatar');
        $filename = time() . '_' . str_replace(' ', '_', $avatar->getClientOriginalName());
        $avatar->move($dir, $filename);

        return $filename;
    }

    private function deleteAvatar(?string $filename): void
    {
        $path = public_path('testimonials/' . $filename);

        if ($filename && file_exists($path)) {
            unlink($path);
        }
    }
}
