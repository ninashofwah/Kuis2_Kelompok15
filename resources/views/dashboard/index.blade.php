@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-8">Ringkasan Operasional</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-indigo-500">
        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Unit Kamar</h4>
        <p class="text-3xl font-black mt-2">{{ $totalKamar }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-500">
        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Kamar Tersedia</h4>
        <p class="text-3xl font-black text-green-600 mt-2">{{ $kamarTersedia }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-red-500">
        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Kamar Terisi</h4>
        <p class="text-3xl font-black text-red-600 mt-2">{{ $kamarTerisi }}</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-yellow-500">
        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pendapatan Bulan Ini</h4>
        <p class="text-2xl font-black text-indigo-700 mt-2">Rp {{ number_format($totalPendapatan) }}</p>
    </div>
</div>
@endsection