<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_absensi',
        'hari',
        'keterangan',
    ];

    public function wargas()
    {
        return $this->belongsToMany(Warga::class, 'absensi_warga');
    }
}
