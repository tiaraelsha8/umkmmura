<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DataUmum;
use App\Models\Kbli;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataUmums = DataUmum::with('kblis')->oldest()->get();
        $kblis     = Kbli::orderBy('kode')->get();

        //Total UMKM
        $total_umkm = DataUmum::Count();
        $total_kbli = Kbli::Count();

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

        $data_kbli = Kbli::withCount('dataUmum')->get();
        $namakbli = $data_kbli->pluck('nama')->toArray();
        $jmlhkbli = $data_kbli->pluck('data_umum_count')->toArray();
        return view('backend.dashboard',compact('dataUmums','kblis','total_umkm','total_kbli','namakecamatan','jmlhkecamatan','namakelurahan','jmlhkelurahan','namakbli','jmlhkbli'));
    }
}
