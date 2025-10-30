<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataUmum extends Model
{
    use HasFactory;

    protected $casts = [
        'izin_nib' => 'boolean',
        'izin_usaha' => 'boolean',
    ];
    protected $table = 'data_umums';
    protected $primaryKey = 'id_umum'; // bukan id default
    protected $fillable = ['nib', 'nama_perusahaan', 'uraian_jenis', 'alamat', 'kelurahan', 'kecamatan', 'nilai_investasi', 'izin_nib', 'izin_usaha'];

    // relasi many-to-many ke KBLI
    public function kblis()
    {
        return $this->belongsToMany(Kbli::class, 'data_umum_kbli', 'data_umum_id', 'kbli_id')->withTimestamps();
    }
}
