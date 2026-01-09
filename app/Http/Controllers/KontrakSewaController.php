<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontrakSewa;
use App\Models\Penyewa;
use App\Models\Kamar;

class KontrakSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontraks = KontrakSewa::with(['penyewa', 'kamar'])->get();
        return view('kontrak-sewa.index', compact('kontraks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penyewas = Penyewa::all();
        $kamars = Kamar::where('status', 'tersedia')->get();

        return view('kontrak-sewa.create', compact('penyewas', 'kamars'));

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penyewa_id' => 'required',
            'kamar_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai'
        ]);

        $kontrak = KontrakSewa::create([
            'penyewa_id' => $request->penyewa_id,
            'kamar_id' => $request->kamar_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'harga_bulanan' => Kamar::find($request->kamar_id)->harga_bulanan,
            'status' => 'aktif'
        ]);

        Kamar::where('id', $request->kamar_id)
            ->update(['status' => 'terisi']);

        return redirect()->route('kontrak-sewa.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kontrak->load(['penyewa', 'kamar', 'pembayaran']);
        return view('kontrak-sewa.show', compact('kontrak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
