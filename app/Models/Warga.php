<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'blok',
        'nama',
        'no_telp',
        'jadwal_ronda',
    ];

    public function absensis()
    {
        return $this->belongsToMany(Absensi::class, 'absensi_warga');
    }
}