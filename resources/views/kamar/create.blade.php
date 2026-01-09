@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Unit Kamar</h1>
        <p class="text-sm text-gray-500">Masukkan detail informasi unit kamar baru.</p>
    </div>

    <form action="{{ route('kamar.store') }}" method="POST">
        @csrf
        <div class="space-y-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Kamar</label>
                <input type="text" name="nomor_kamar" value="{{ old('nomor_kamar') }}" placeholder="Contoh: A1, B10"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2.5 border @error('nomor_kamar') border-red-500 @enderror">
                @error('nomor_kamar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tipe Kamar</label>
                    <select name="tipe" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">
                        <option value="standard">Standard</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="vip">VIP</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga Bulanan (Rp)</label>
                    <input type="number" name="harga_bulanan" value="{{ old('harga_bulanan') }}" placeholder="1500000"
                        class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border @error('harga_bulanan') border-red-500 @enderror">
                    @error('harga_bulanan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Fasilitas</label>
                <textarea name="fasilitas" rows="3" placeholder="Contoh: AC, WiFi, Kamar Mandi Dalam..."
                    class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">{{ old('fasilitas') }}</textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('kamar.index') }}" class="px-4 py-2 text-gray-600 font-medium hover:bg-gray-100 rounded-lg transition">Batal</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-bold shadow-sm transition">Simpan Unit</button>
            </div>
        </div>
    </form>
</div>
@endsection