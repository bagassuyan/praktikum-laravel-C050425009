<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class HitungTotalSksController extends Controller
{
    public function __invoke(Request $request)
    {
        // Menghitung jumlah total SKS dari database
        $totalSks = Matakuliah::sum('sks');

        return "Total SKS seluruh mata kuliah: " . $totalSks;
    }
}

