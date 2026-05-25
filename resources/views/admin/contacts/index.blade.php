@extends('admin.layout')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-8">Inbox Contact</h1>

    <div class="bg-white rounded-3xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-zinc-50 border-b">
                    <tr>
                        <th class="px-6 py-5 text-left font-medium">Nama</th>
                        <th class="px-6 py-5 text-left font-medium">Email</th>
                        <th class="px-6 py-5 text-left font-medium hidden md:table-cell">Pesan</th>
                        <th class="px-6 py-5 text-center font-medium">Tanggal</th>
                        <th class="px-6 py-5 text-center font-medium">Status</th>
                        <th class="px-6 py-5 text-center font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    @foreach($contacts as $contact)
                    <tr class="hover:bg-zinc-50 transition">
                        <td class="px-6 py-5 font-medium">{{ $contact->name }}</td>
                        <td class="px-6 py-5 text-zinc-600">{{ $contact->email }}</td>
                        <td class="px-6 py-5 text-zinc-600 hidden md:table-cell">
                            <p class="line-clamp-2">{{ $contact->message }}</p>
                        </td>
                        <td class="px-6 py-5 text-sm text-zinc-500 whitespace-nowrap">
                            {{ $contact->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-5 text-center">
                            @if($contact->is_read)
                                <span class="bg-emerald-100 text-emerald-700 px-4 py-1 rounded-full text-xs font-medium">Dibaca</span>
                            @else
                                <span class="bg-amber-100 text-amber-700 px-4 py-1 rounded-full text-xs font-medium">Baru</span>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-center whitespace-nowrap">
                            <a href="{{ route('admin.contacts.show', $contact) }}"
                               class="text-blue-600 hover:text-blue-700 font-medium mr-4">Lihat</a>

                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus pesan ini?')"
                                        class="text-red-600 hover:text-red-700 font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
