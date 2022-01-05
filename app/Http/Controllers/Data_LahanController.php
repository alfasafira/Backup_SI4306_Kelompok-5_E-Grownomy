<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use Illuminate\Http\Request;

class Data_LahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data_lahan.show', [
            'title' => 'Data Lahan',
            'table' => 'Tabel Lahan',
            'active' => 'data',
            'lahan' => Lahan::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lahan = Lahan::findOrFail($id);
        return view('data_lahan.edit', [
            'title' => 'Edit Data Lahan',
            'active' => 'data',
            'lahan' => $lahan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id) {

        // validating input
        $lahan = Lahan::find($id);

        $lahan->statlahan = $request['status_verifikasi'];
        $lahan->save();
        return redirect('/data_lahan/show');
    }

    
}