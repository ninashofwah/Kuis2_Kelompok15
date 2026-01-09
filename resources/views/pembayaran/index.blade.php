@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Riwayat Pembayaran</h1>
    <a href="{{ route('pembayaran.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-emerald-700 transition">
        + Catat Pembayaran
    </a>
</div>

<div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 text-gray-500 text-xs font-bold uppercase">
            <tr>
                <th class="px-6 py-4 text-left">Penyewa / Unit</th>
                <th class="px-6 py-4 text-left">Periode</th>
                <th class="px-6 py-4 text-left">Jumlah Bayar</th>
                <th class="px-6 py-4 text-left">Tanggal Bayar</th>
                <th class="px-6 py-4 text-left">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($pembayarans as $p)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <div class="font-bold text-gray-900">{{ $p->kontrakSewa->penyewa->nama_lengkap }}</div>
                    <div class="text-xs text-indigo-600 font-semibold uppercase">Unit {{ $p->kontrakSewa->kamar->nomor_kamar }}</div>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    {{ date('F', mktime(0, 0, 0, $p->bulan, 1)) }} {{ $p->tahun }}
                </td>
                <td class="px-6 py-4 text-sm font-bold text-gray-900">
                    Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($p->tanggal_bayar)->format('d/m/Y') }}
                </td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                        {{ strtoupper($p->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection