<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\KontrakSewa;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 10 Kamar dengan berbagai tipe
        $tipeKamar = ['standard', 'deluxe', 'vip'];
        for ($i = 1; $i <= 10; $i++) {
            Kamar::create([
                'nomor_kamar'   => 'A' . $i,
                'tipe'          => $tipeKamar[array_rand($tipeKamar)],
                'harga_bulanan' => rand(10, 25) * 100000,
                'fasilitas'     => 'AC, WiFi, Kamar Mandi Dalam',
                'status'        => 'tersedia',
            ]);
        }

        // 2. Buat 5 Penyewa
        for ($i = 1; $i <= 5; $i++) {
            Penyewa::create([
                'nama_lengkap'  => 'Penyewa Ke-' . $i,
                'nomor_telepon' => '0812345678' . $i,
                'nomor_ktp'     => '320101010101000' . $i,
                'alamat_asal'   => 'Alamat Asal No.' . $i,
                'pekerjaan'     => 'Mahasiswa',
            ]);
        }

        // 3. Buat Kontrak Sewa & Hubungkan ke Kamar/Penyewa
        $semuaPenyewa = Penyewa::all();
        $semuaKamar = Kamar::all();

        foreach ($semuaPenyewa as $index => $penyewa) {
            $kamar = $semuaKamar[$index];
            
            $kontrak = KontrakSewa::create([
                'penyewa_id'      => $penyewa->id,
                'kamar_id'        => $kamar->id,
                'tanggal_mulai'   => now()->subMonths(1)->format('Y-m-d'),
                'tanggal_selesai' => now()->addMonths(11)->format('Y-m-d'),
                'harga_bulanan'   => $kamar->harga_bulanan,
                'status'          => 'aktif',
            ]);

            $kamar->update(['status' => 'terisi']);

            // 4. Buat Pembayaran (1 Lunas, 1 Tertunggak)
            Pembayaran::create([
                'kontrak_sewa_id' => $kontrak->id,
                'bulan'           => now()->subMonth()->month,
                'tahun'           => now()->year,
                'jumlah_bayar'    => $kontrak->harga_bulanan,
                'tanggal_bayar'   => now()->subMonth(),
                'status'          => 'lunas',
            ]);

            Pembayaran::create([
                'kontrak_sewa_id' => $kontrak->id,
                'bulan'           => now()->month,
                'tahun'           => now()->year,
                'jumlah_bayar'    => 0,
                'tanggal_bayar'   => now(),
                'status'          => 'tertunggak',
                'keterangan'      => 'Belum bayar bulan ini',
            ]);
        }
    }
}