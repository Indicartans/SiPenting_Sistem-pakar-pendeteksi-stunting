<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\TingkatDepresi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = ["isi", "judul", "kode_depresi", "id_gambar", "url_gambar", "saran", 'slug'];

    public function depresi()
    {
        return $this->belongsTo(TingkatDepresi::class, 'kode_depresi', 'kode_depresi');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = static::createUniqueSlug($artikel->judul);
            } else {
                $artikel->slug = static::createUniqueSlug($artikel->slug, $artikel->id);
            }
        });
    }

    /**
     * Create a unique slug.
     *
     * @param  string  $title
     * @param  int  $id
     * @return string
     */
    protected static function createUniqueSlug($title, $id = 0)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }


    public function fillTabel()
    {

        $artikel = [
            [
                "kode_depresi" => "P001",
                "url_gambar" => 'https://www.who.int/images/default-source/searo---images/features/child-stunting.jpg',
                "judul" => 'Stunting',
                "isi" => 'Stunting adalah kondisi di mana seorang anak memiliki tinggi badan yang jauh lebih pendek dibandingkan anak-anak seusianya. Penyebab utama dari stunting adalah malnutrisi kronis yang dialami oleh anak selama periode penting pertumbuhan dan perkembangan, terutama dalam 1000 hari pertama kehidupan.',
                "saran" => 'Berikan anak makanan yang bergizi dan seimbang, periksakan kesehatan secara rutin, dan pastikan anak mendapatkan imunisasi yang lengkap.'
            ],
            [
                "kode_depresi" => "P002",
                "url_gambar" => 'https://plus.unsplash.com/premium_photo-1668062843172-0129f25a1276?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80',
                "judul" => 'Gizi Lebih (Obesitas)',
                "isi" => 'Obesitas adalah kondisi kelebihan berat badan yang terjadi ketika tubuh menimbun lemak berlebihan. Obesitas dapat menyebabkan berbagai masalah kesehatan seperti penyakit jantung, diabetes tipe 2, dan tekanan darah tinggi.',
                "saran" => 'Anak harus mengonsumsi makanan seimbang dengan porsi yang sesuai, meningkatkan aktivitas fisik, dan mengurangi makanan tinggi gula dan lemak.'
            ],
            [
                "kode_depresi" => "P003",
                "url_gambar" => 'https://www.globalcitizen.org/en/content/images/2020/08/Unicef-Water-UN0292318.jpg',
                "judul" => 'Gizi Kurang',
                "isi" => 'Gizi kurang adalah kondisi di mana tubuh tidak mendapatkan cukup nutrisi yang dibutuhkan untuk pertumbuhan dan perkembangan yang sehat. Hal ini dapat mengakibatkan berbagai masalah kesehatan seperti pertumbuhan terhambat, kerentanan terhadap penyakit, dan masalah dalam perkembangan kognitif.',
                "saran" => 'Pastikan anak mendapatkan asupan makanan yang cukup dan bergizi, serta pantau kesehatan anak secara rutin untuk mencegah dan mengatasi kekurangan gizi.'
            ],
            [
                "kode_depresi" => "P004",
                "url_gambar" => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2022/10/04084507/Ini-Ciri-Ciri-Depresi-Ringan-yang-Masih-Sering-Diabaikan.jpg',
                "judul" => 'Marasmus',
                "isi" => 'Marasmus adalah jenis malnutrisi yang disebabkan oleh defisiensi kalori dan protein yang parah. Anak-anak yang mengalami marasmus biasanya memiliki berat badan yang sangat rendah untuk usia mereka, kulit dan tulang tampak menonjol, dan mereka cenderung lemah dan lelah.',
                "saran" => 'Berikan makanan tinggi kalori dan protein, serta konsultasikan dengan ahli gizi untuk penanganan yang tepat dan teratur.'
            ],
            [
                "kode_depresi" => "P005",
                "url_gambar" => 'https://soc-phoenix.s3-ap-southeast-1.amazonaws.com/wp-content/uploads/2017/09/22173906/mental-illness-and-disorders.jpg',
                "judul" => 'Kwashiorkor',
                "isi" => 'Kwashiorkor adalah jenis malnutrisi yang disebabkan oleh defisiensi protein yang parah. Gejala-gejala kwashiorkor meliputi pembengkakan, kulit kering dan bersisik, kelemahan otot, dan penurunan berat badan.',
                "saran" => 'Konsumsi makanan tinggi protein seperti daging, ikan, telur, dan kacang-kacangan, serta perawatan medis untuk memperbaiki kondisi nutrisi.'
            ]
        ];


        return $artikel;
    }
}
