<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_orangtua',
        'nama_anak',
        'usia',
        'kontak',
        'alamat'
    ];
}
