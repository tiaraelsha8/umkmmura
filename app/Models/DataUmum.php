<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    use HasFactory;

    protected $table = 'kbli';

    protected $fillable = ['nib', 'nama_perusahaan', 'uraian_jenis', 'alamat', 'kelurahan', 'kecamatan', 'nilai_investasi', 'kode_kbli'];

    public function kblis()
    {
        return $this->belongsTo(Kbli::class, 'kode_kbli', 'id');
    }
}
