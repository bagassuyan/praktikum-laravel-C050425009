<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderMhsTI extends Controller
{
    public function tampilkanSemua()
    {
        $data = DB::table('mahasiswas')->paginate(10);
        return view('demo.query-builder', compact('data'));
    }

    public function tampilkanFilter()
    {
        $data = DB::table('mahasiswas')
            ->where('prodi', 'Teknik Informatika')
            ->whereBetween('semester', [3, 6])
            ->orderBy('nama', 'asc')
            ->get();
        return view('demo.query-builder', compact('data'));
    }

    public function rekapProdi()
    {
        $data = DB::table('mahasiswas')
            ->select('prodi', DB::raw('count(*) as jumlah'))
            ->groupBy('prodi')
            ->get();

        return view('demo.rekap-prodi', compact('data'));
    }
}

