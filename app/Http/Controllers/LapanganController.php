<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Lokasi;
use App\Models\Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::all();
        $lapangan = Lapangan::all();
        $pengelola = Pengelola::all();
        return view('admin.lapangan', compact('lokasi', 'lapangan', 'pengelola'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaLapangan' => 'required|string|max:255',
        ],[
            'namaLapangan.required' => 'Lapangan harus diisi',
        ]);

        DB::table('lapangans')->insert([
            'namaLapangan' => $validatedData['namaLapangan'],
            'pengelola' => $request->pengelola,
            'lokasii_id' => $request->lokasi,
            'hargaLapangan' => $request->hargaLapangan,
        ]);

        Session::flash('success', 'Data Lapangan baru dengan nama "' . $validatedData['namaLapangan'] . '" berhasil ditambahkan!');

        return redirect()->route('indexlapangan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
