<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kbli extends Model
{
    use HasFactory;

    protected $table = 'kblis';
    protected $primaryKey = 'id_kbli'; // wajib karena bukan 'id'
    protected $fillable = ['kode', 'nama', 'deskripsi'];

    public function dataUmum()
    {
        return $this->belongsToMany(DataUmum::class, 'data_umum_kbli', 'kbli_id', 'data_umum_id')->withTimestamps();
    }
}
