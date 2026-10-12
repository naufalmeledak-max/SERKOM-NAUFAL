<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasis';

    protected $fillable = [
        'nama_prestasi',
        'nama_siswa',
        'tingkat',
        'peringkat',
        'keterangan',
        'foto',
        'tahun_ajaran',
    ];
}
