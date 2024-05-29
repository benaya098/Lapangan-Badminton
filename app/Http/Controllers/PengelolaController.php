<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
        
            $required = [
                'username' => 'required|min:5',
                'password' => 'required|min:6',
            ];
        
            $message = [
                'username.required' => 'Kolom username harus diisi',
                'username.min' => 'username minimal 5 karakter',
                'password.required' => 'Kolom password harus diisi',
                'password.min' => 'password minimal 6 karakter',
            ];
        
            $this->validate($request, $required, $message);
        
            // Logika autentikasi
            $this->validate($request, $required, $message);
            if (Auth::guard('pengelola')->attempt(['username' => $data['username'], 'password' => $data['password']])) {
                return redirect('/pengelola/index');
            } else {
                return redirect()->back()->with('error_message', 'invalid username or password');
            }
        }
        return view('pengelola.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('pengelola.index');
    }

     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        Auth::guard('pengelola')->logout();
        return redirect('/');
    }
}
