<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lahan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static function getLahans() {
        $lahans = DB::table('lahans')
            ->get();

        return $lahans;
    }

    public static function getLahansBySupplier(String $supplier) {
        $lahans = DB::table('lahans')
            ->where('supplier', $supplier)
            ->get();

        return $lahans;
    }

    public static function getLahanById(int $id) {
        $lahan = DB::table('lahans')
            ->where('id', $id)
            ->first();
            
        return $lahan;
    }
}