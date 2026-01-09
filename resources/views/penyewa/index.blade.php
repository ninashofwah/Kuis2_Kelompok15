@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Basis Data Penyewa</h1>
    <a href="{{ route('penyewa.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-indigo-700">+ Registrasi</a>
</div>

<div class="bg-white shadow-sm rounded-xl overflow-hidden border">
    <table class="min-w-full">
        <thead class="bg-gray-50 text-gray-500 text-xs font-bold uppercase">
            <tr>
                <th class="px-6 py-4 text-left">Nama</th>
                <th class="px-6 py-4 text-left">Kontak</th>
                <th class="px-6 py-4 text-left">Pekerjaan</th>
                <th class="px-6 py-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($penyewas as $p)
            <tr>
                <td class="px-6 py-4 font-bold text-gray-900">{{ $p->nama_lengkap }}</td>
                <td class="px-6 py-4 text-sm">{{ $p->nomor_telepon }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $p->pekerjaan }}</td>
                <td class="px-6 py-4 text-sm">
                    <a href="{{ route('penyewa.edit', $p->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection