@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.testimonials.index') }}"
           class="inline-flex items-center gap-2 bg-white border border-zinc-300 hover:border-zinc-400 hover:bg-zinc-50 transition px-5 py-3 rounded-2xl text-sm font-medium text-zinc-700">
            ← Kembali
        </a>
        <h1 class="text-3xl font-bold">Edit Testimoni</h1>
    </div>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl p-8 shadow">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Nama Pemberi Testimoni</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:outline-none focus:border-black">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Jabatan / Posisi (Opsional)</label>
                        <input type="text" name="position" value="{{ old('position', $testimonial->position) }}"
                               class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:outline-none focus:border-black">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Perusahaan / Instansi (Opsional)</label>
                        <input type="text" name="company" value="{{ old('company', $testimonial->company) }}"
                               class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:outline-none focus:border-black">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Isi Testimoni</label>
                    <textarea name="content" rows="5" required
                              class="w-full border border-zinc-300 rounded-3xl px-5 py-4 focus:outline-none focus:border-black">{{ old('content', $testimonial->content) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Rating (Opsional)</label>
                        <select name="rating"
                                class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:outline-none focus:border-black">
                            <option value="">Tanpa rating</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected(old('rating', $testimonial->rating) == $i)>{{ $i }} Bintang</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Urutan Tampil</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0"
                               class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:outline-none focus:border-black">
                        <p class="text-xs text-zinc-500 mt-1">Angka lebih kecil tampil lebih dulu.</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Foto / Avatar (Opsional)</label>
                    @if($testimonial->avatar)
                        <img src="{{ asset('testimonials/' . $testimonial->avatar) }}"
                             alt="{{ $testimonial->name }}"
                             class="w-24 h-24 rounded-full object-cover border border-zinc-200 mb-4">
                    @endif
                    <input type="file" name="avatar" accept="image/*"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    <p class="text-xs text-zinc-500 mt-1">Kosongkan jika tidak ingin mengganti foto.</p>
                </div>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1"
                           @checked(old('is_published', $testimonial->is_published))
                           class="rounded border-zinc-300 text-black focus:ring-black">
                    <span class="text-sm font-medium">Tampilkan di halaman utama</span>
                </label>

                <button type="submit"
                        class="w-full bg-black text-white py-6 rounded-3xl font-semibold hover:bg-zinc-800 transition">
                    Update Testimoni
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
