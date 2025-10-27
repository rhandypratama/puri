<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kritik extends Model
{
    use HasFactory;

    protected $fillable = [
        'isi',
        'ip_address',
    ];
}
