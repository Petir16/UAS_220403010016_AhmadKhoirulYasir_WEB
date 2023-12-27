<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mahasiswa = Mahasiswa::all();
        return view('pages.data-mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.input-form', ['mahasiswa' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $profil   = $request->file('gambar');
        $filename = date('Y-m-d') . $profil->getClientOriginalName();
        $path = 'profil-user';

        $res = Storage::disk('public')->putFileAs($path, $profil, $filename);

        Mahasiswa::create([
            "nama" => $request->nama,
            "nim" => $request->nim,
            "prodi" => $request->prodi,
            "gambar" => Storage::url($res)
        ]);


        return redirect()->to('mahasiswa')->with('alert', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->get();
        return view('pages.data-mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('pages.input-form', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $profil   = $request->file('gambar');
        $filename = date('Y-m-d') . $profil->getClientOriginalName();
        $path = 'profil-user';

        $res = Storage::disk('public')->putFileAs($path, $profil, $filename);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->gambar = Storage::url($res);
        $mahasiswa->save();
        return redirect()->to('mahasiswa')->with('alert', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            Mahasiswa::where('id', $id)->delete();
            return redirect()->to('mahasiswa')->with('alert', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            //
            return redirect()->back()->with('alert', $e->getMessage());
        }
    }
}
