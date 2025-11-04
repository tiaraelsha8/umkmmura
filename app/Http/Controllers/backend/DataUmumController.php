<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataUmum;
use App\Models\Kbli;
use Illuminate\Database\QueryException;


class DataUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUmums = DataUmum::with('kblis')->oldest()->get();
        $kblis     = Kbli::orderBy('kode')->get();
        return view('backend.dataumum.index', compact('dataUmums', 'kblis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kblis = Kbli::orderBy('kode')->get();
        return view('backend.dataumum.create', compact('kblis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nib' => 'required|unique:data_umums,nib',
            'nama_perusahaan' => 'required',
            'uraian_jenis' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nilai_investasi' => 'nullable|integer',
            'kbli_ids' => 'required|array|min:1',
            'izin_nib' => 'nullable|boolean',
            'izin_usaha' => 'nullable|boolean',
        ]);

        $dataUmum = DataUmum::create([
            'nib' => $request->nib,
            'nama_perusahaan' => $request->nama_perusahaan,
            'uraian_jenis' => $request->uraian_jenis,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'nilai_investasi' => $request->nilai_investasi,
            'izin_nib' => $request->has('izin_nib'),
            'izin_usaha' => $request->has('izin_usaha'),
        ]);

        $dataUmum->kblis()->attach($request->kbli_ids);

        return redirect()
            ->route('dataumum.index')
            ->with(['success' => 'Data berhasil disimpan!']);
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
        // ambil data umum berdasarkan id
        $dataUmum = DataUmum::with('kblis')->findOrFail($id);

        // ambil semua data kbli untuk dropdown / pilihan
        $kblis = Kbli::all();

        return view('backend.dataumum.edit', compact('dataUmum', 'kblis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataUmum = DataUmum::findOrFail($id);

        $request->validate([
            'nib' => 'required|unique:data_umums,nib,' . $id . ',id_umum',
            'nama_perusahaan' => 'required',
            'uraian_jenis' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nilai_investasi' => 'nullable|integer',
            'izin_nib' => 'nullable|boolean',
            'izin_usaha' => 'nullable|boolean',
        ]);

        $dataUmum->update([
            'nib' => $request->nib,
            'nama_perusahaan' => $request->nama_perusahaan,
            'uraian_jenis' => $request->uraian_jenis,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'nilai_investasi' => $request->nilai_investasi,
            'izin_nib' => $request->has('izin_nib'),
            'izin_usaha' => $request->has('izin_usaha'),
        ]);

        $dataUmum->kblis()->sync($request->kbli_ids ?? []);

        return redirect()
            ->route('dataumum.index')
            ->with(['success' => 'Data berhasil diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $dataUmum = DataUmum::findOrFail($id);
            $dataUmum->delete();

            return redirect()
                ->route('dataumum.index')
                ->with(['success' => 'Data berhasil dihapus!']);
        } catch (QueryException $e) {
            return redirect()
                ->route('dataumum.index')
                ->with(['error' => 'Gagal menghapus data umum!']);
        }
    }
}
