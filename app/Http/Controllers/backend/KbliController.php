<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kbli;

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
        return redirect()->route('kbli.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
            'kode' => 'required|unique:kblis,kode,' . $kbli->id_kbli,
            'nama' => 'required',
            'deskripsi' => 'string|nullable',
        ]);

         Kbli::update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        //redirect to index
        return redirect()->route('kbli.index')->with(['success' => 'Data Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
            
         //get by ID
         $kbli = kbli::findOrFail($id);

         //delete 
         $kbli->delete();
 
         //redirect to index
         return redirect()->route('kbli.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (QueryException $e) {
            // Jika gagal karena masih dipakai (foreign key restrict)
            return redirect()->route('kbli.index')->with(['error' => 'Tidak bisa menghapus! Jabatan masih digunakan oleh pegawai.']);
        }
    }
}
