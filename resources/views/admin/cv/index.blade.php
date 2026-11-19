@extends('admin.layout')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Download CV</h1>
        <p class="text-zinc-500 mt-2">Upload, ganti, atau hapus file CV yang tampil di halaman utama.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-300 text-emerald-700 px-6 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl p-8 shadow">

        @if($cv)
            <!-- CV saat ini -->
            <div class="flex items-center gap-4 p-5 border border-zinc-200 rounded-2xl bg-zinc-50 mb-8">
                <div class="shrink-0 w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.828a2 2 0 00-1.06-1.776l-5-2.5A2 2 0 0012 5.172V3a1 1 0 00-1-1H7a2 2 0 00-2 2v15a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-6 4h4" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium truncate">{{ $cv->original_name }}</p>
                    <p class="text-sm text-zinc-500">Diupload {{ $cv->created_at->format('d M Y') }}</p>
                </div>
                <a href="{{ route('cv.download') }}" class="shrink-0 text-sm font-medium text-blue-600 hover:text-blue-700">Download</a>
            </div>

            <!-- Ganti CV -->
            <form action="{{ route('admin.cv.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium mb-2">Ganti File CV (PDF, maks 5MB)</label>
                    <input type="file" name="cv" accept="application/pdf" required
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    @error('cv')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-black text-white px-8 py-3 rounded-2xl font-medium hover:bg-zinc-800 transition">
                    Replace CV
                </button>
            </form>

            <!-- Hapus CV -->
            <div class="mt-8 pt-6 border-t border-zinc-200">
                <form action="{{ route('admin.cv.destroy') }}" method="POST" onsubmit="return confirm('Yakin hapus CV ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 border border-red-200 px-6 py-3 rounded-2xl font-medium hover:bg-red-50 transition">
                        Hapus CV
                    </button>
                </form>
            </div>

        @else
            <!-- Upload CV -->
            <form action="{{ route('admin.cv.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-2">Upload CV (PDF, maks 5MB)</label>
                    <input type="file" name="cv" accept="application/pdf" required
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    @error('cv')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-black text-white px-8 py-3 rounded-2xl font-medium hover:bg-zinc-800 transition">
                    Upload CV
                </button>
            </form>
        @endif

    </div>
</div>
@endsection