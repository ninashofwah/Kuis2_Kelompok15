@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Input Pembayaran Sewa</h1>
        <p class="text-sm text-gray-500">Catat transaksi pembayaran dari penyewa secara akurat.</p>
    </div>

    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
        <div class="space-y-5">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Kontrak Aktif</label>
                <select name="kontrak_sewa_id" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Pilih Penyewa (Nomor Unit) --</option>
                    @foreach($kontraks as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->penyewa->nama_lengkap }} (Unit {{ $k->kamar->nomor_kamar }})
                        </option>
                    @endforeach
                </select>
                @error('kontrak_sewa_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Untuk Bulan</label>
                    <select name="bulan" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">
                        @for ($m=1; $m<=12; $m++)
                            <option value="{{ $m }}" {{ date('n') == $m ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tahun</label>
                    <input type="number" name="tahun" value="{{ date('Y') }}" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Jumlah Pembayaran (Rp)</label>
                <input type="number" name="jumlah_bayar" placeholder="Contoh: 1500000" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border @error('jumlah_bayar') border-red-500 @enderror">
                @error('jumlah_bayar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Transaksi</label>
                <input type="date" name="tanggal_bayar" value="{{ date('Y-m-d') }}" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Keterangan (Opsional)</label>
                <textarea name="keterangan" rows="2" placeholder="Contoh: Bayar via transfer Bank BCA" class="w-full border-gray-300 rounded-lg shadow-sm p-2.5 border"></textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-100">
                <a href="{{ route('pembayaran.index') }}" class="px-4 py-2 text-gray-600 font-medium hover:bg-gray-100 rounded-lg transition">Batal</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-bold shadow-lg transition transform active:scale-95">
                    Simpan Pembayaran
                </button>
            </div>
        </div>
        <input type="hidden" name="status" value="lunas">
    </form>
</div>
@endsection