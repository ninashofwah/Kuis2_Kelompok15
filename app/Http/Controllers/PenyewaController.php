<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewa;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewas = Penyewa::with('kontrakSewa')->get();
        return view('penyewa.index', compact('penyewas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyewa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nomor_ktp' => 'required|unique:penyewa'
        ]);

        Penyewa::create($request->all());
        return redirect()->route('penyewa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penyewa->load('kontrakSewa');
        return view('penyewa.show', compact('penyewa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('penyewa.edit', compact('penyewa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penyewa->update($request->all());
        return redirect()->route('penyewa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyewa->delete();
        return redirect()->route('penyewa.index');
    }
}
