<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lahan;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class LahanController extends Controller
{
    public function create() {
        return view('lahan/create', [
            'title' => 'Lahan | Create'
        ]);
    }

    public function store(Request $request) {

        // validating input
        $lahan = $request->validate([
            'luas' => 'required|numeric',
            'categorylahan' => 'required|min:3|max:255',
            'lokasi' => 'required|min:3|max:255',
            'keterangan' => 'required|min:3|max:255',
            'statlahan' => 'required',
            'supplier' => 'required'
        ]);

        // insert lahan record
        DB::table('lahans')->insert($lahan);
        return redirect('/lahan/show');
    }

    public function show() {
        return view('lahan/show', [
            'lahans' => Lahan::getLahansBySupplier(auth()->user()->username),
            'title' => 'Lahan | Show'
        ]);
    }

    public function edit(int $id) {

        // authorization
        $lahan = Lahan::getLahanById($id);
        if ($lahan->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        return view('lahan/edit', [
            'lahan' => $lahan,
            'title' => 'Lahan | Edit'
        ]);
    }

    public function update(Request $request, int $id) {

        // validating input
        $lahan = $request->validate([
            'luas' => 'required|numeric',
            'categorylahan' => 'required|min:3|max:255',
            'lokasi' => 'required|min:3|max:255',
            'keterangan' => 'required|min:3|max:255',
            'statlahan' => 'required',
            'supplier' => 'required'
        ]);

        // updating lahan record
        DB::table('lahans')->where('id', $id)->update($lahan);
        return redirect('/lahan/show');
    }

    public function destroy(int $id) {
        
        // authorization
        $lahan = Lahan::getLahanById($id);
        if ($lahan->supplier != auth()->user()->username) {
            abort(403, 'Unauthorized action.');
        }

        // deleting lahan record
        DB::table('lahans')->where('id', $id)->delete();
        return redirect('/lahan/show');
    }
}