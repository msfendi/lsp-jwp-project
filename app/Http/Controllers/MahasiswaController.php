<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use DateTime;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'nim' => 'required|max:10',
        //     'nama' => 'required|max:50',
        //     'alamat' => 'required|max:100',
        //     'tgl_lahir' => 'required|date',
        // ]);

        $data = $request->all();
        $data['tgl_lahir'] = date('Y-m-d', strtotime($data['tgl_lahir']));
        $data['usia'] = $this->hitungUmurMahasiswa($data['tgl_lahir']);
        Mahasiswa::create($data);
        return redirect()->route('dashboard.index')->with('success', 'Data berhasil disimpan');
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $data = $request->all();
        $data['tgl_lahir'] = date('Y-m-d', strtotime($data['tgl_lahir']));
        $data['usia'] = $this->hitungUmurMahasiswa($data['tgl_lahir']);
        $mahasiswa->update($data);
        return redirect()->route('dashboard.index')->with('update', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('dashboard.index')->with('destroy', 'Data berhasil dihapus');
    }

    // function hitung umur mahasiswa
    public function hitungUmurMahasiswa($tgl_lahir)
    {
        $tgl_lahir = new DateTime($tgl_lahir);
        $today = new DateTime('today');
        $umur = $today->diff($tgl_lahir);
        return $umur->y;
    }
}
