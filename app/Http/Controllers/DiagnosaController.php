<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Http\Requests\StoreDiagnosaRequest;
use App\Http\Requests\UpdateDiagnosaRequest;
use App\Models\Anak;
use App\Models\Artikel;
use App\Models\Gejala;
use App\Models\Keputusan;
use App\Models\KondisiUser;
use App\Models\TingkatDepresi;
use GeminiAPI\Laravel\Facades\Gemini;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('pakar');
        $diagnosa = Diagnosa::all();

        return view('admin/diagnosa/admin_semua_diagnosa', [
            "diagnosa" => $diagnosa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'gejala' => Gejala::all(),
            'kondisi_user' => KondisiUser::all()
        ];

        return view('clients/form_diagnosa', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiagnosaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiagnosaRequest $request)
    {
        // dd($request->all());

        $filteredArray = $request->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        // dd($kondisi);
        $kodeGejala = [];
        $bobotPilihan = [];
        foreach ($kondisi as $key => $val) {
            if ($val != "#") {
                echo "key : $key, val : $val";
                echo "<br>";
                array_push($kodeGejala, $key);
                array_push($bobotPilihan, array($key, $val));
            }
        }

        $depresi = TingkatDepresi::all();
        $cf = 0;
        // penyakit
        $arrGejala = [];
        for ($i = 0; $i < count($depresi); $i++) {
            $cfArr = [
                "cf" => [],
                "kode_depresi" => []
            ];
            $res = 0;
            $ruleSetiapDepresi = Keputusan::whereIn("kode_gejala", $kodeGejala)->where("kode_depresi", $depresi[$i]->kode_depresi)->get();
            // dd($ruleSetiapDepresi);
            if (count($ruleSetiapDepresi) > 0) {
                foreach ($ruleSetiapDepresi as $ruleKey) {
                    $cf = $ruleKey->mb - $ruleKey->md;
                    array_push($cfArr["cf"], $cf);
                    array_push($cfArr["kode_depresi"], $ruleKey->kode_depresi);
                }
                $res = $this->getGabunganCf($cfArr);
                // dd($res);
                // print "<br> res : $res <br>";
                array_push($arrGejala, $res);
            } else {
                continue;
            }
        }
        // dd($arrGejala);
        // echo "<br> arrGejala : ";
        // print_r($arrGejala);
        // echo "<br>";

        $diagnosa_id = uniqid();
        $ins =  Diagnosa::create([
            'diagnosa_id' => strval($diagnosa_id),
            'data_diagnosa' => json_encode($arrGejala),
            'kondisi' => json_encode($bobotPilihan)
        ]);
        // dd($ins);

        $dataAnak = [
            'nama_orangtua' => $request->nama_orangtua,
            'nama_anak' => $request->nama_anak,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'lingkar_lengan' => $request->lingkar_lengan,
            'lingkar_kepala' => $request->lingkar_kepala,
            'usia' => $request->usia,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat
        ];

        session(['data_anak' => $dataAnak]);
        // $cek_data = session('data_anak');
        // dd($cek_data);

        return redirect()->route('spk.result', [
            "diagnosa_id" => $diagnosa_id,
        ]);
    }

    public function getGabunganCf($cfArr)
    {
        // if ($cfArr["kode_depresi"][0] == "P004") {
        //     # code...
        //     dd($cfArr);
        // }
        // echo "<br> cfArr : ";
        // print_r($cfArr);
        // echo "<br>";
        // dd($cfArr);
        if (!$cfArr["cf"]) {
            return 0;
        }
        if (count($cfArr["cf"]) == 1) {
            return [
                "value" => strval($cfArr["cf"][0]),
                "kode_depresi" => $cfArr["kode_depresi"][0]
            ];
        }

        $cfoldGabungan = $cfArr["cf"][0];

        // foreach ($cfArr["cf"] as $cf) {
        //     $cfoldGabungan = $cfoldGabungan + ($cf * (1 - $cfoldGabungan));
        // }

        for ($i = 0; $i < count($cfArr["cf"]) - 1; $i++) {
            $cfoldGabungan = $cfoldGabungan + ($cfArr["cf"][$i + 1] * (1 - $cfoldGabungan));
        }


        return [
            "value" => "$cfoldGabungan",
            "kode_depresi" => $cfArr["kode_depresi"][0]
        ];
    }

    public function diagnosaResult($diagnosa_id)
    {
        $data_anak = session('data_anak');
        // dd($data_anak);
        $diagnosa = Diagnosa::where('diagnosa_id', $diagnosa_id)->first();
        $gejala = json_decode($diagnosa->kondisi, true);
        $data_diagnosa = json_decode($diagnosa->data_diagnosa, true);
        // dd($data_diagnosa);
        $int = 0.0;
        $diagnosa_dipilih = [];
        foreach ($data_diagnosa as $val) {
            // print_r(floatval($val["value"]));
            if (floatval($val["value"]) > $int) {
                $diagnosa_dipilih["value"] = floatval($val["value"]);
                $diagnosa_dipilih["kode_depresi"] = TingkatDepresi::where("kode_depresi", $val["kode_depresi"])->first();
                $int = floatval($val["value"]);
            }
        }

        if (!isset($diagnosa_dipilih["kode_depresi"]) || empty($diagnosa_dipilih["kode_depresi"])) {
            return redirect()->back()->with('error_message', 'Jawab minimal 1 pertanyaan.');
        }
        // dd($diagnosa_dipilih);
        // dd($gejala);

        $kodeGejala = [];
        foreach ($gejala as $key) {
            array_push($kodeGejala, $key[0]);
        }
        // dd($kodeGejala);
        $kode_depresi = $diagnosa_dipilih["kode_depresi"]->kode_depresi;

        $pakar = Keputusan::whereIn("kode_gejala", $kodeGejala)->where("kode_depresi", $kode_depresi)->get();
        // dd($pakar);
        $gejala_by_user = [];
        foreach ($pakar as $key) {
            $i = 0;
            foreach ($gejala as $gKey) {
                if ($gKey[0] == $key->kode_gejala) {
                    array_push($gejala_by_user, $gKey);
                }
            }
        }
        // dd($gejala_by_user);

        $nilaiPakar = [];
        foreach ($pakar as $key) {
            array_push($nilaiPakar, ($key->mb - $key->md));
        }
        $nilaiUser = [];
        foreach ($gejala_by_user as $key) {
            array_push($nilaiUser, $key[1]);
        }
        // dd($nilaiPakar);
        // dd($nilaiUser);

        $cfKombinasi = $this->getCfCombinasi($nilaiPakar, $nilaiUser);
        // dd($cfKombinasi);
        $hasil = $this->getGabunganCf($cfKombinasi);
        // dd($diagnosa_dipilih);
        // dd($data_anak);
        // dd($hasil);
        $artikel = Artikel::where('kode_depresi', $kode_depresi)->first();

        $rekomendasi = Gemini::generateText("saya terdiagnosa penyakit" . $diagnosa_dipilih['kode_depresi']->depresi . "dengan tingkat kepastian" . round($hasil['value'] * 100, 2) . "berikan saya saran yang harus saya lakukan dan berikan contoh makanan atau suplemen yang harus saya konsumsi");
        // dd($rekomendasi);
        $rekomendasiPretty = json_encode($rekomendasi, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        Anak::create([
            'nama_orangtua' => $data_anak["nama_orangtua"],
            'nama_anak' => $data_anak["nama_anak"],
            'usia' => $data_anak["usia"],
            'penyakit' => $diagnosa_dipilih["kode_depresi"]->depresi,
            'presentase' => round($hasil['value'] * 100, 2),
            'kontak' => $data_anak["kontak"],
            'alamat' => $data_anak["alamat"]
        ]);
        // dd($data_anak);
        return view('clients.cl_diagnosa_result', [
            "diagnosa" => $diagnosa,
            "diagnosa_dipilih" => $diagnosa_dipilih,
            "gejala" => $gejala,
            "data_diagnosa" => $data_diagnosa,
            "pakar" => $pakar,
            "gejala_by_user" => $gejala_by_user,
            "cf_kombinasi" => $cfKombinasi,
            "hasil" => $hasil,
            "artikel" => $artikel,
            "data_anak" =>  $data_anak,
            'rekomendasi' => $rekomendasiPretty
        ]);
    }

    public function getCfCombinasi($pakar, $user)
    {
        $cfComb = [];
        if (count($pakar) == count($user)) {
            for ($i = 0; $i < count($pakar); $i++) {
                $res = $pakar[$i] * $user[$i];
                array_push($cfComb, floatval($res));
            }
            return [
                "cf" => $cfComb,
                "kode_depresi" => ["0"]
            ];
        } else {
            return "Data tidak valid";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show($diagnosa_id)
    {
        // dd($diagnosa);
        $diagnosa = Diagnosa::where('diagnosa_id', $diagnosa_id)->first();
        $gejala = json_decode($diagnosa->kondisi, true);
        $data_diagnosa = json_decode($diagnosa->data_diagnosa, true);
        // dd($gejala);

        $int = 0.0;
        $diagnosa_dipilih = [];
        foreach ($data_diagnosa as $val) {
            // print_r(floatval($val["value"]));
            if (floatval($val["value"]) > $int) {
                $diagnosa_dipilih["value"] = floatval($val["value"]);
                $diagnosa_dipilih["kode_depresi"] = TingkatDepresi::where("kode_depresi", $val["kode_depresi"])->first();
                $int = floatval($val["value"]);
            }
        }
        // dd($diagnosa_dipilih);

        $kodeGejala = [];
        foreach ($gejala as $key) {
            array_push($kodeGejala, $key[0]);
        }
        // dd($gejala, $diagnosa_dipilih, $diagnosa);
        // dd($detail->data_diagnosa);

        return view("admin.diagnosa.detail_diagnosa", compact('gejala', 'diagnosa_dipilih', 'diagnosa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiagnosaRequest  $request
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiagnosaRequest $request, Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        //
    }
}
