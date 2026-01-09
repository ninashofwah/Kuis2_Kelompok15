@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Kontrak Aktif</h1>
    <a href="{{ route('kontrak-sewa.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-indigo-700">+ Buat Kontrak</a>
</div>

<div class="bg-white shadow-sm rounded-xl overflow-hidden border">
    <table class="min-w-full">
        <thead class="bg-gray-50 text-gray-500 text-xs font-bold uppercase">
            <tr>
                <th class="px-6 py-4 text-left">Penyewa</th>
                <th class="px-6 py-4 text-left">Kamar</th>
                <th class="px-6 py-4 text-left">Berakhir</th>
                <th class="px-6 py-4 text-left">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($kontraks as $k)
            <tr>
                <td class="px-6 py-4 font-bold">{{ $k->penyewa->nama_lengkap }}</td>
                <td class="px-6 py-4 text-indigo-700 font-bold uppercase tracking-widest">{{ $k->kamar->nomor_kamar }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($k->tanggal_selesai)->format('d M Y') }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $k->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ strtoupper($k->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection