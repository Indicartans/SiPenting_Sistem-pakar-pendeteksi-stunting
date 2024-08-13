<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psn extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelapor',
        'nama',
        'rt',
        'rw',
        'jentik_nyamuk',
        'penyakit',
        'jumlah',
    ];
}
