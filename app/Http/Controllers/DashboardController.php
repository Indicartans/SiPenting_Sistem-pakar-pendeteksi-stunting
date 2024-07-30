<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\KondisiUser;
use App\Models\TingkatDepresi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use GeminiAPI\Laravel\Facades\Gemini;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data dari model lain
        $gejala = Gejala::all();
        $kondisi_user = KondisiUser::all();
        $user = User::all();
        $tingkat_depresi = TingkatDepresi::all();

        $test = Gemini::generateText('apa kabar sayang?');
        // dd($test);
        // Kirim data ke tampilan
        return view('admin/dashboard', compact('gejala', 'kondisi_user', 'user', 'tingkat_depresi', 'test'));
    }

    public function chartData()
    {
        $barData = DB::table('anaks')
            ->select(DB::raw('penyakit, MONTHNAME(created_at) as bulan, COUNT(*) as jumlah'))
            ->groupBy('penyakit', 'bulan')
            ->get();

        // Mengambil data untuk doughnut chart
        $doughnutData = DB::table('anaks')
            ->select(DB::raw('penyakit, COUNT(*) as jumlah'))
            ->groupBy('penyakit')
            ->get();

        $usiaData = DB::table('anaks')
            ->select(DB::raw('penyakit, CASE WHEN usia < 2 THEN "Usia < 2" ELSE "Usia >= 2" END as usia_kategori, COUNT(*) as jumlah'))
            ->groupBy('penyakit', 'usia_kategori')
            ->get();

        return response()->json([
            'barData' => $barData,
            'doughnutData' => $doughnutData,
            'usiaData' => $usiaData
        ]);
    }
}
