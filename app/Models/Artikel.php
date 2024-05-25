<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = ["isi", "judul", "kode_depresi", "id_gambar", "url_gambar"];

    public function depresi()
    {
        return $this->belongsTo(TingkatDepresi::class, 'kode_depresi', 'kode_depresi');
    }

    public function fillTabel()
    {
        // $artikel = [
        //     [
        //         "kode_depresi" => "P001",
        //         "url_gambar" => 'https://plus.unsplash.com/premium_photo-1668062843172-0129f25a1276?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80',
        //         "judul" => 'Gangguan Mood',
        //         "isi" => 'Ganggguan mood yang terjadi pada seseorang ini umumnya terjadi karena banyaknya tekanan yang menimpa dirinya dan cenderung terlarut dalam tekanan dapat meningkatkan resiko berkembangnya gangguan mood yang kemudian dapat berubah menjadi depresi terutama depresi mayor. Hal ini terbukti pada suatu penelitian yang menemukan bahwa dalam sekitar empat dari lima kasus, depresi mayor diawali oleh peristiwa kehidupan yang penuh tekanan.'
        //     ],
        //     [
        //         "kode_depresi" => "P002",
        //         "url_gambar" => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2022/10/04084507/Ini-Ciri-Ciri-Depresi-Ringan-yang-Masih-Sering-Diabaikan.jpg',
        //         "judul" => 'Depresi Minor / Depresi Ringan',
        //         "isi" => 'Depresi ringan ini di identikkan dengan depresi minor yang merupakan perasaan melankolis yang berlangsung sebentar dan disebabkan oleh sebuah kejadian yang tragis atau mengandung ancaman, atau kehilangan sesuatu yang penting dalam kehidupan si penderita (Meier, 2000: 20-21). Orang dengan depresi ringan ini setidaknya memiliki 2 dari gejala lainnya dan 2-3 dari gejala utama. (Maslim, 2003, 64).'
        //     ],
        //     [
        //         "kode_depresi" => "P003",
        //         "url_gambar" => 'https://soc-phoenix.s3-ap-southeast-1.amazonaws.com/wp-content/uploads/2017/09/22173906/mental-illness-and-disorders.jpg',
        //         "judul" => 'Depresi Sedang',
        //         "isi" => 'Depresi sedang ini di alami oleh penderita selama kurang 2 minggu, dan orang dengan depresi sedang ini mengalami kesulitan nyata untuk meneruskan kegiatan social, pekerjaan dan urusan rumah tangga. Orang dengan depresi sedang ini setidaknya memiliki 2-3 dari gejala utama dan 3-4 dari gejala lainnya (Maslim,  2003: 64).'
        //     ],
        //     [
        //         "kode_depresi" => "P004",
        //         "url_gambar" => 'https://soc-phoenix.s3-ap-southeast-1.amazonaws.com/wp-content/uploads/2017/09/22173906/mental-illness-and-disorders.jpg',
        //         "judul" => 'Depresi mayor / Depresi Berat',
        //         "isi" => 'Depresi mayor merupakan salah satu gangguan yang prevalensinya paling tinggi di antara berbagai gangguan (Davidson, 2006: 374). Depresi mayor adalah kemurungan yang dalam dan menyebar luas. Perasaan murung ini mampu menyedot semangat dan energy serta menyelubungi kehidupan si penderita seperti asap yang tebak dan menyesakkan dada. Depresi mayor ini dapat berlangsung cukup lama mulai dari empat belas hari sampai beberapa tahun. Hal ini menyebabkan penderita akan sangat sulit utnuk berfungsi dengan baik di lingkungannya. Orang dengan depresi mayor ini juga terkadang disertai dengan keinginan untuk bunuh diri atau bahkan keinginan untuk mati. Orang yang sangat tertekan, mereka akan mengalami dampak hal-hal yang mengganggu kejiwaan mereka seperti gila, paranoia atau halusinasi pendengaran (Meier, 2000: 25-26).'
        //     ]
        // ];

        $artikel = [
            [
                "kode_depresi" => "P001",
                "url_gambar" => 'https://www.who.int/images/default-source/searo---images/features/child-stunting.jpg',
                "judul" => 'Stunting',
                "isi" => 'Stunting adalah kondisi di mana seorang anak memiliki tinggi badan yang jauh lebih pendek dibandingkan anak-anak seusianya. Penyebab utama dari stunting adalah malnutrisi kronis yang dialami oleh anak selama periode penting pertumbuhan dan perkembangan, terutama dalam 1000 hari pertama kehidupan.'
            ],
            [
                "kode_depresi" => "P002",
                "url_gambar" => 'https://plus.unsplash.com/premium_photo-1668062843172-0129f25a1276?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80',
                "judul" => 'Gizi Lebih (Obesitas)',
                "isi" => 'Obesitas adalah kondisi kelebihan berat badan yang terjadi ketika tubuh menimbun lemak berlebihan. Obesitas dapat menyebabkan berbagai masalah kesehatan seperti penyakit jantung, diabetes tipe 2, dan tekanan darah tinggi.'
            ],
            [
                "kode_depresi" => "P003",
                "url_gambar" => 'https://www.globalcitizen.org/en/content/images/2020/08/Unicef-Water-UN0292318.jpg',
                "judul" => 'Gizi Kurang',
                "isi" => 'Gizi kurang adalah kondisi di mana tubuh tidak mendapatkan cukup nutrisi yang dibutuhkan untuk pertumbuhan dan perkembangan yang sehat. Hal ini dapat mengakibatkan berbagai masalah kesehatan seperti pertumbuhan terhambat, kerentanan terhadap penyakit, dan masalah dalam perkembangan kognitif.'
            ],
            [
                "kode_depresi" => "P004",
                "url_gambar" => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2022/10/04084507/Ini-Ciri-Ciri-Depresi-Ringan-yang-Masih-Sering-Diabaikan.jpg',
                "judul" => 'Marasmus',
                "isi" => 'Marasmus adalah jenis malnutrisi yang disebabkan oleh defisiensi kalori dan protein yang parah. Anak-anak yang mengalami marasmus biasanya memiliki berat badan yang sangat rendah untuk usia mereka, kulit dan tulang tampak menonjol, dan mereka cenderung lemah dan lelah.'
            ],
            [
                "kode_depresi" => "P005",
                "url_gambar" => 'https://soc-phoenix.s3-ap-southeast-1.amazonaws.com/wp-content/uploads/2017/09/22173906/mental-illness-and-disorders.jpg',
                "judul" => 'Kwashorkor',
                "isi" => 'Kwashorkor adalah jenis malnutrisi yang disebabkan oleh defisiensi protein yang parah. Gejala-gejala kwashiorkor meliputi pembengkakan, kulit kering dan bersisik, kelemahan otot, dan penurunan berat badan.'
            ]
        ];

        return $artikel;
    }
}
