<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kbli extends Model
{
    use HasFactory;

    protected $table = 'kbli';

    protected $fillable = ['kode', 'nama'];

    public function data_umums()
    {
        return $this->hasMany(DataUmum::class, 'kode_kbli', 'id');
    }
}
