<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Imports\KbliImport;
use Illuminate\Http\Request;
use App\Models\Kbli;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;

class KbliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kbli = Kbli::all();
        return view('backend.kbli.index', compact('kbli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.kbli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kblis,kode',
            'nama' => 'required',
            'deskripsi' => 'string|nullable',
        ]);

        Kbli::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        //redirect to index
        return redirect()
            ->route('kbli.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
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
        $kbli = Kbli::findOrFail($id);
        return view('backend.kbli.edit', compact('kbli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|unique:kblis,kode,' . $id . ',id_kbli',
            'nama' => 'required',
            'deskripsi' => 'string|nullable',
        ]);

        $kbli = Kbli::findOrFail($id);

        $kbli->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        //redirect to index
        return redirect()
            ->route('kbli.index')
            ->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kbli = Kbli::withCount('dataUmum')->findOrFail($id);

            // Cek apakah KBLI masih dipakai di Data Umum
            if ($kbli->data_umum_count > 0) {
                return redirect()
                    ->route('kbli.index')
                    ->with(['error' => 'Tidak bisa menghapus! KBLI masih digunakan oleh Data Umum.']);
            }

            // Jika tidak dipakai, baru hapus
            $kbli->delete();

            return redirect()
                ->route('kbli.index')
                ->with(['success' => 'Data KBLI berhasil dihapus!']);
        } catch (QueryException $e) {
            return redirect()
                ->route('kbli.index')
                ->with(['error' => 'Terjadi error database. Tidak bisa menghapus data KBLI.']);
        } catch (\Exception $e) {
            return redirect()
                ->route('kbli.index')
                ->with(['error' => 'Terjadi kesalahan saat menghapus data.']);
        }
    }

    public function import(Request $request)
    {

        //validate form
        $request->validate([
            'file' => 'required|max:2048'
        ]);

        Excel::import(new KbliImport, $request->file('file'));

        //redirect to index
        return redirect()->route('kbli.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
