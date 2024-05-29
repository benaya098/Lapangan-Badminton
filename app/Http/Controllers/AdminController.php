<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengelola = Pengelola::all();
        $lokasi = Lokasi::all();
        return view('admin.tambah', compact('pengelola', 'lokasi'));
        
    }

    public function createpengelola(Request $request)
    {
        $validatedData = $request->validate([
            'namaPengelola' => 'required|string|max:255',
            'username' => 'required|string|min:5|max:20',
            'password' => 'required|string|min:5|max:10',

        ],[
            'namaLokasi.required' => 'Lokasi harus diisi',
            'username.required' => 'Username harus diisi',
            'username.min' => 'Username minimal 5 huruf',
            'username.max' => 'Username maksimal 20 huruf',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 5 huruf',
            'password.max' => 'Password mininmal 10 huruf'
        ]);

        DB::table('pengelolas')->insert([
            'namaPengelola' => $validatedData['namaPengelola'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'lokasi_id' => $request->lokasi,
        ]);

        Session::flash('success', 'Data Pengelola baru dengan nama "' . $validatedData['namaPengelola'] . '" berhasil ditambahkan!');

        return redirect()->route('indextambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
