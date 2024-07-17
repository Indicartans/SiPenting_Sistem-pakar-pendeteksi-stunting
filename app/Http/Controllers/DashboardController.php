<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\KondisiUser;
use App\Models\TingkatDepresi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data dari model lain
        $gejala = Gejala::all();
        $kondisi_user = KondisiUser::all();
        $user = User::all();
        $tingkat_depresi = TingkatDepresi::all();

        // Ambil data_diagnosa dari model Diagnosa
        $diagnosa = Diagnosa::pluck('data_diagnosa');

        // Fungsi untuk menemukan data dengan nilai value tertinggi
        function getMaxValue($dataList)
        {
            $maxValue = -INF;
            $maxData = null;

            foreach ($dataList as $item) {
                $parsed = json_decode($item, true); // Dekode JSON menjadi array asosiatif
                foreach ($parsed as $entry) {
                    $value = (float) $entry['value'];
                    if ($value > $maxValue) {
                        $maxValue = $value;
                        $maxData = $entry;
                    }
                }
            }

            return $maxData;
        }

        // Temukan data dengan value tertinggi dari data_diagnosa
        $maxData = getMaxValue($diagnosa);

        // dd($maxData);

        // Kirim data ke tampilan
        return view('admin.dashboard', compact('gejala', 'kondisi_user', 'user', 'tingkat_depresi', 'diagnosa', 'maxData'));
    }
}
