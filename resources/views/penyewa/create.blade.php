@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Registrasi Penyewa</h1>
        <p class="text-sm text-gray-500">Lengkapi data identitas penyewa dengan benar.</p>
    </div>

    <form action="{{ route('penyewa.store') }}" method="POST">
        @csrf
        <div class="space-y-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" 
                    class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border @error('nama_lengkap') border-red-500 @enderror">
                @error('nama_lengkap') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor WhatsApp</label>
                    <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="08..."
                        class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor KTP (NIK)</label>
                    <input type="text" name="nomor_ktp" value="{{ old('nomor_ktp') }}" 
                        class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border @error('nomor_ktp') border-red-500 @enderror">
                    @error('nomor_ktp') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Mahasiswa / Karyawan"
                    class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Asal</label>
                <textarea name="alamat_asal" rows="2" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">{{ old('alamat_asal') }}</textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('penyewa.index') }}" class="px-4 py-2 text-gray-600 font-medium hover:bg-gray-100 rounded-lg transition">Batal</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-bold shadow-sm transition">Simpan Penyewa</button>
            </div>
        </div>
    </form>
</div>
@endsection