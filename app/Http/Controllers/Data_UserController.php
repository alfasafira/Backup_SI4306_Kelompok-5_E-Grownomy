<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Data_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data_user.show', [
            'title' => 'Data User',
            'table' => 'Tabel User',
            'active' => 'data',
            'user' => User::orderBy('id', 'desc')->get()
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
        $user = User::findOrFail($id);
        return view('data_user.edit', [
            'title' => 'Edit Data User',
            'active' => 'data',
            'user' => $user
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
        $user = User::find($id);

        $user->role = $request['role'];
        $user->save();
        return redirect('/data_user/show');
    }

    
}