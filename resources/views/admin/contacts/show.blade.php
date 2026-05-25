@extends('admin.layout')

@section('content')
<div class="max-w-3xl mx-auto">

    <!-- Tombol Kembali -->
    <div class="mb-8">
        <a href="{{ route('admin.contacts.index') }}"
           class="inline-flex items-center gap-2 bg-white border border-zinc-300 hover:border-zinc-400 hover:bg-zinc-50 transition px-5 py-3 rounded-2xl text-sm font-medium text-zinc-700">
            ← Kembali ke Inbox
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-8">Detail Pesan</h1>

    <div class="bg-white rounded-3xl p-8 shadow">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-b pb-6">
            <div>
                <p class="text-zinc-500 text-sm">Nama</p>
                <p class="text-xl font-medium">{{ $contact->name }}</p>
            </div>
            <div>
                <p class="text-zinc-500 text-sm">Email</p>
                <p class="text-xl font-medium break-all">{{ $contact->email }}</p>
            </div>
        </div>

        <div class="mt-8">
            <p class="text-zinc-500 text-sm mb-2">Pesan</p>
            <p class="text-lg leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
        </div>

        <div class="mt-10 text-sm text-zinc-500">
            Dikirim pada:
            <span class="font-medium">
                {{ $contact->created_at->timezone('Asia/Makassar')->format('d F Y • H:i') }}
            </span>
            <span class="text-xs text-zinc-400 ml-2">(WITA)</span>
        </div>
    </div>

    <div class="mt-8">
        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Hapus pesan ini?')"
                    class="text-red-600 hover:text-red-700 font-medium">
                🗑 Hapus Pesan
            </button>
        </form>
    </div>
</div>
@endsection
