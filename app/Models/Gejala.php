<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $guard = ["id"];
    protected $fillable = ["kode_gejala", "gejala"];

    public function keputusan()
    {
        return $this->hasMany(Keputusan::class, 'kode_gejala', 'kode_gejala');
    }

    public function fillTable()
    {


        // $gejala2 = [
        //     [
        //         "kode_gejala" => "G001",
        //         "gejala" => "Sering Merasa Sedih"
        //     ],
        //     [
        //         "kode_gejala" => "G002",
        //         "gejala" => "Sering kelelahan melakukan aktifitas ringan"
        //     ],
        //     [
        //         "kode_gejala" => "G003",
        //         "gejala" => "Kurang konsentrasi dalam belajar "
        //     ],
        //     [
        //         "kode_gejala" => "G004",
        //         "gejala" => "Mudah merasa bosan"
        //     ],
        //     [
        //         "kode_gejala" => "G005",
        //         "gejala" => "Sering Melamun"
        //     ],
        //     [
        //         "kode_gejala" => "G006",
        //         "gejala" => "Tidak semangat melakukan sesuatu"
        //     ],
        //     [
        //         "kode_gejala" => "G007",
        //         "gejala" => "Merasa Risau"
        //     ],
        //     [
        //         "kode_gejala" => "G008",
        //         "gejala" => "Pesimis"
        //     ],
        //     [
        //         "kode_gejala" => "G009",
        //         "gejala" => "Sering menangis secara tiba-tiba"
        //     ],
        //     [
        //         "kode_gejala" => "G010",
        //         "gejala" => "Gangguan susah Tidur"
        //     ],
        //     [
        //         "kode_gejala" => "G011",
        //         "gejala" => "Merasa Cemas Berlebihan"
        //     ],
        //     [
        //         "kode_gejala" => "G012",
        //         "gejala" => "Kecewa dengan diri sendiri"
        //     ],
        //     [
        //         "kode_gejala" => "G013",
        //         "gejala" => "Terganggu dengan banyak hal"
        //     ],
        //     [
        //         "kode_gejala" => "G014",
        //         "gejala" => "Sering murung"
        //     ],
        //     [
        //         "kode_gejala" => "G015",
        //         "gejala" => "Kehilangan minat terhadap hoby"
        //     ],
        //     [
        //         "kode_gejala" => "G016",
        //         "gejala" => "Merasa kesepian"
        //     ],
        //     [
        //         "kode_gejala" => "G017",
        //         "gejala" => "Sering merasa bersalah"
        //     ],
        //     [
        //         "kode_gejala" => "G018",
        //         "gejala" => "Merasa dihakimi"
        //     ],
        //     [
        //         "kode_gejala" => "G019",
        //         "gejala" => "Membenci Diri Sendiri"
        //     ],
        //     [
        //         "kode_gejala" => "G020",
        //         "gejala" => "Mudah tersinggung"
        //     ],
        //     [
        //         "kode_gejala" => "G021",
        //         "gejala" => "Kehilangan Nafsu makan "
        //     ],
        //     [
        //         "kode_gejala" => "G022",
        //         "gejala" => "Khawatir tentang penampilan"
        //     ],
        //     [
        //         "kode_gejala" => "G023",
        //         "gejala" => "Mudah Marah"
        //     ],
        //     [
        //         "kode_gejala" => "G024",
        //         "gejala" => "Suka menyendiri"
        //     ],
        //     [
        //         "kode_gejala" => "G025",
        //         "gejala" => "Pikiran Untuk Bunuh Diri"
        //     ],
        //     [
        //         "kode_gejala" => "G026",
        //         "gejala" => "Sulit mengambil keputusan"
        //     ],
        //     [
        //         "kode_gejala" => "G027",
        //         "gejala" => "Sulit melakukan kegiatan dengan Baik"
        //     ],
        //     [
        //         "kode_gejala" => "G028",
        //         "gejala" => "Ada penambahan dan penurunan berat badan"
        //     ],
        //     [
        //         "kode_gejala" => "G029",
        //         "gejala" => "Kurang percaya diri"
        //     ],
        // ];

        $gejala2 = [
            [
                "kode_gejala" => "G001",
                "gejala" => "Jika dibandingkan dengan anak seusianya tinggi badannya paling pendek"
            ],
            [
                "kode_gejala" => "G002",
                "gejala" => "Pertumbuhan tulang terhambat"
            ],
            [
                "kode_gejala" => "G003",
                "gejala" => "Terserang berbagai penyakit infeksi"
            ],
            [
                "kode_gejala" => "G004",
                "gejala" => "Wajah tampak lebih muda dari anak seusianya"
            ],
            [
                "kode_gejala" => "G005",
                "gejala" => "Pertumbuhan gigi terhambat"
            ],
            [
                "kode_gejala" => "G006",
                "gejala" => "Memori belajar yang kurang baik"
            ],
            [
                "kode_gejala" => "G007",
                "gejala" => "Anak jadi lebih pendiam dan tidak banyak melakukan kontak mata dengan orang sekitar pada umur 8-10 tahun"
            ],
            [
                "kode_gejala" => "G008",
                "gejala" => "Pubertas terlambat"
            ],
            [
                "kode_gejala" => "G009",
                "gejala" => "Kelebihan berat badan"
            ],
            [
                "kode_gejala" => "G010",
                "gejala" => "Obesitas"
            ],
            [
                "kode_gejala" => "G011",
                "gejala" => "Badan Gemuk"
            ],
            [
                "kode_gejala" => "G012",
                "gejala" => "Nafsu makan rendah"
            ],
            [
                "kode_gejala" => "G013",
                "gejala" => "Skala tubuh cenderung normal namun balita terlihat lebih muda/kecil untuk usianya"
            ],
            [
                "kode_gejala" => "G014",
                "gejala" => "Sering sakit dan memerlukan waktu yang lama untuk pulih"
            ],
            [
                "kode_gejala" => "G015",
                "gejala" => "Keletihan akut"
            ],
            [
                "kode_gejala" => "G016",
                "gejala" => "Sanitasi yang buruk"
            ],
            [
                "kode_gejala" => "G017",
                "gejala" => "Kulit dan rambut kering"
            ],
            [
                "kode_gejala" => "G018",
                "gejala" => "Kehilangan lemak dan massa otot tubuh"
            ],
            [
                "kode_gejala" => "G019",
                "gejala" => "Diare kronis"
            ],
            [
                "kode_gejala" => "G020",
                "gejala" => "Mudah marah"
            ],
            [
                "kode_gejala" => "G021",
                "gejala" => "Rambut rangup dan gampang tanggal"
            ],
            [
                "kode_gejala" => "G022",
                "gejala" => "Menurunnya perkembangan kognitif"
            ],
            [
                "kode_gejala" => "G023",
                "gejala" => "Terhalanganya perutumbuhan psikis, kecerdasan"
            ],
            [
                "kode_gejala" => "G024",
                "gejala" => "Sakit kepala"
            ],
            [
                "kode_gejala" => "G025",
                "gejala" => "Selalu lapar"
            ],
            [
                "kode_gejala" => "G026",
                "gejala" => "Badan tampak semakin ramping"
            ],
            [
                "kode_gejala" => "G027",
                "gejala" => "Muka terlihat tua"
            ],
            [
                "kode_gejala" => "G028",
                "gejala" => "Berat badan menurun"
            ],
            [
                "kode_gejala" => "G029",
                "gejala" => "Mudah menangis"
            ],
            [
                "kode_gejala" => "G030",
                "gejala" => "Otot-otot melemah"
            ],
            [
                "kode_gejala" => "G031",
                "gejala" => "Kulit terlihat keriput"
            ],
            [
                "kode_gejala" => "G032",
                "gejala" => "Edema (pembengkakan) pada tungkai, kaki, tangan, beserta muka"
            ],
            [
                "kode_gejala" => "G033",
                "gejala" => "Bintik dan bersisik pada kulit"
            ],
            [
                "kode_gejala" => "G034",
                "gejala" => "Perut makin mengembung"
            ],
            [
                "kode_gejala" => "G035",
                "gejala" => "Infeksi yang lebih sering dan parah disebabkan sistem kekebalan tubuh yang rusak"
            ],
            [
                "kode_gejala" => "G036",
                "gejala" => "Tanda jari membekas di kulit saat disentuh"
            ]
        ];


        return $gejala2;
    }
}
