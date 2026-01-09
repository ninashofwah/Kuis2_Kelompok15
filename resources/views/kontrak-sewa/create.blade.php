@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('kontrak-sewa.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold flex items-center">
            ← Kembali ke Daftar Kontrak
        </a>
    </div>

    <div class="bg-white shadow-sm border border-gray-200 rounded-xl overflow-hidden">
        <div class="bg-gray-50 border-b border-gray-200 p-6">
            <h1 class="text-2xl font-bold text-gray-800">Aktivasi Kontrak Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Gunakan formulir ini untuk menghubungkan penyewa dengan unit kamar yang tersedia.</p>
        </div>

        <form action="{{ route('kontrak-sewa.store') }}" method="POST" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Penyewa</label>
                    <select name="penyewa_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border @error('penyewa_id') border-red-500 @enderror">
                        <option value="">-- Cari Nama Penyewa --</option>
                        @foreach($penyewas as $p)
                            <option value="{{ $p->id }}" {{ old('penyewa_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_lengkap }} ({{ $p->pekerjaan }})
                            </option>
                        @endforeach
                    </select>
                    @error('penyewa_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Unit Kamar (Hanya yang Tersedia)</label>
                    <select name="kamar_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border @error('kamar_id') border-red-500 @enderror">
                        <option value="">-- Pilih Nomor Kamar --</option>
                        @foreach($kamars as $kmr)
                            @if($kmr->status == 'tersedia')
                                <option value="{{ $kmr->id }}" {{ old('kamar_id') == $kmr->id ? 'selected' : '' }}>
                                    Unit {{ $kmr->nomor_kamar }} - {{ strtoupper($kmr->tipe) }} (Rp {{ number_format($kmr->harga_bulanan) }}/bln)
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('kamar_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Mulai Sewa</label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', date('Y-m-d')) }}" 
                        class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border focus:ring-indigo-500">
                    @error('tanggal_mulai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Berakhir Kontrak</label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" 
                        class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border focus:ring-indigo-500">
                    @error('tanggal_selesai') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2">
                    <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                        <label class="block text-sm font-bold text-indigo-900 mb-2">Harga Sewa Bulanan (Kesepakatan)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">Rp</span>
                            <input type="number" name="harga_bulanan" value="{{ old('harga_bulanan') }}" placeholder="Masukkan angka saja"
                                class="w-full border-indigo-200 rounded-lg shadow-sm pl-10 p-2.5 border focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <p class="text-[11px] text-indigo-500 mt-2 font-medium">* Isi jika harga berbeda dengan harga standar unit kamar.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-100">
                <button type="reset" class="px-4 py-2 text-gray-500 font-semibold hover:text-gray-700 transition">
                    Reset Form
                </button>
                <button type="submit" class="px-8 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-bold shadow-lg transition transform active:scale-95">
                    Aktifkan Kontrak Sekarang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection