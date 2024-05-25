<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatDepresi extends Model
{
    use HasFactory;
    protected $table = 'tingkat_depresi';
    protected $guard = ["id"];
    protected $fillable = ['kode_depresi', 'depresi'];

    public function keputusan()
    {
        return $this->hasMany(Keputusan::class, 'kode_depresi', 'kode_depresi');
    }

    public function fillTable()
    {
        // $depresi = [
        //     [
        //         "kode_depresi" => "P001",
        //         "depresi" => "Gangguan Mood"
        //     ],
        //     [
        //         "kode_depresi" => "P002",
        //         "depresi" => "Depresi Ringan"
        //     ],
        //     [
        //         "kode_depresi" => "P003",
        //         "depresi" => "Depresi Sedang"
        //     ],
        //     [
        //         "kode_depresi" => "P004",
        //         "depresi" => "Depresi Berat"
        //     ],
        // ];
        $depresi = [
            [
                "kode_depresi" => "P001",
                "depresi" => "Stunting"
            ],
            [
                "kode_depresi" => "P002",
                "depresi" => "Gizi Lebih"
            ],
            [
                "kode_depresi" => "P003",
                "depresi" => "Gizi Kurang"
            ],
            [
                "kode_depresi" => "P004",
                "depresi" => "Marasmus"
            ],
            [
                "kode_depresi" => "P005",
                "depresi" => "Kwashiorkor"
            ]
        ];

        return $depresi;
    }
}
