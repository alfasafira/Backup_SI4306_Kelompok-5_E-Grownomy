<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kecamatan.kecamatan', [
            'title' => 'Kecamatan',
            'table' => 'Tabel Kecamatan',
            'active' => 'data',
            'kecamatan' => Kecamatan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kecamatan.create-kecamatan', [
            'title' => 'Tambah Kecamatan',
            'active' => 'data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->all();
        Kecamatan::create($validatedData);

        return redirect('/kecamatan')->with('success', 'Data Kecamatan sudah ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        return view('kecamatan.show-kecamatan', [
            'title' => 'Detail Kecamatan',
            'active' => 'data',
            'kecamatan' => $kecamatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit-kecamatan', [
            'title' => 'Edit Kecamatan',
            'active' => 'data',
            'kecamatan' => $kecamatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $updateKecamatan = $request->validate([
            'nama_kecamatan' => 'required',
            'luas_kecamatan' => 'required',
            'jumlah_desa' => 'required',
            'jumlah_petani' => 'required',
        ]);

        Kecamatan::where('id', $kecamatan->id)->update($updateKecamatan);
        // $updateTahun->save();
        return redirect('/kecamatan')->with('update', 'Kecamatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::destroy($id);
        return redirect('/kecamatan')->with('success', 'Data Kecamatan berhasil dihapus!');
    }
}
