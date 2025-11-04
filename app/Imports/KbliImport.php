<?php

namespace App\Imports;

use App\Models\Kbli;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KbliImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kbli([
            'kode' => $row['kode'],
            'nama' => $row['nama'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }
}
