<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\backend\KbliController;
use App\Http\Controllers\Controller;
use App\Models\DataUmum;
use App\Models\Kbli;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dataUmums = DataUmum::with('kblis')->oldest()->get();
        $kblis     = Kbli::orderBy('kode')->get();

        //Total UMKM
        $total_umkm = DataUmum::Count();
        //UMKM per Kecamatan
        $data_kec = DataUmum::select(DB::raw('COUNT(nib) as total_nib'), 'kecamatan')
            ->groupBy('kecamatan')
            ->get();
        $namakecamatan = $data_kec->pluck('kecamatan')->toArray();
        $jmlhkecamatan = $data_kec->pluck('total_nib')->toArray();

        //UMKM per kelurahan
        $data_kel = DataUmum::select(DB::raw('COUNT(nib) as total_nib'), 'kelurahan')
            ->groupBy('kelurahan')
            ->get();
        $namakelurahan = $data_kel->pluck('kelurahan')->toArray();
        $jmlhkelurahan = $data_kel->pluck('total_nib')->toArray();

        $data_kbli = kbli::withCount('dataUmum')->get();
        $namakbli = $data_kbli->pluck('nama')->toArray();
        $jmlhkbli = $data_kbli->pluck('data_umum_count')->toArray();
        //dd($jmlhkbli);
        return view('frontend.home', compact('dataUmums', 'kblis', 'total_umkm', 'namakecamatan', 'jmlhkecamatan', 'namakelurahan', 'jmlhkelurahan', 'namakbli', 'jmlhkbli'));
    }

    public function DataUMKM()
    {
        $dataUmums = DataUmum::with('kblis')->oldest()->get();
        $kblis     = Kbli::orderBy('kode')->get();
        return view('frontend.dataumum.index', compact('dataUmums', 'kblis'));
    }
}
