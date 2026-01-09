@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Manajemen Kamar</h1>
    <a href="{{ route('kamar.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-indigo-700">+ Kamar</a>
</div>

<div class="bg-white shadow-sm rounded-xl overflow-hidden border">
    <table class="min-w-full">
        <thead class="bg-gray-50 text-gray-500 text-xs font-bold uppercase">
            <tr>
                <th class="px-6 py-4 text-left">No. Kamar</th>
                <th class="px-6 py-4 text-left">Tipe</th>
                <th class="px-6 py-4 text-left">Harga/Bulan</th>
                <th class="px-6 py-4 text-left">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($kamars as $k)
            <tr>
                <td class="px-6 py-4 font-bold text-gray-900">{{ $k->nomor_kamar }}</td>
                <td class="px-6 py-4 text-sm uppercase">{{ $k->tipe }}</td>
                <td class="px-6 py-4 text-sm font-medium">Rp {{ number_format($k->harga_bulanan) }}</td>
                <td class="px-6 py-4 text-sm">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $k->status == 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ strtoupper($k->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection