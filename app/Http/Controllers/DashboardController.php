<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pembayaran;
use Carbon\Carbon; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalKamar' => Kamar::count(),
            'kamarTerisi' => Kamar::where('status', 'terisi')->count(),
            'kamarTersedia' => Kamar::where('status', 'tersedia')->count(),
            'totalPendapatan' => Pembayaran::whereMonth('tanggal_bayar', now()->month)
                                            ->where('status', 'lunas')
                                            ->sum('jumlah_bayar'),
            'pembayaranTertunggak' => Pembayaran::where('status', 'tertunggak')->count(),
        
            'pembayaranTerbaru' => Pembayaran::with('kontrakSewa.penyewa', 'kontrakSewa.kamar')
                                ->orderBy('tanggal_bayar', 'desc')
                                ->take(5)
                                ->get(),
        ];

    return view('dashboard.index', $data);
}
}