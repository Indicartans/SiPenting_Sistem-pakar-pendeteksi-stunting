<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Models\TingkatDepresi;
use Clockwork\Request\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keterangan = Artikel::all();
        $penyakit = TingkatDepresi::all();
        return view('admin.keterangan.keterangan', compact('keterangan', 'penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtikelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtikelRequest $request)
    {
        // dd($request->all());
        $request->validate([
            'kode_depresi' => 'required',
            'isi' => 'required'
        ]);

        // Cari entri berdasarkan kode_depresi
        $penyakit = TingkatDepresi::where('kode_depresi', $request->kode_depresi)->first();

        // Jika penyakit ditemukan, ambil judulnya
        if ($penyakit) {
            $judul = $penyakit->depresi;
            // dd($judul);
        } else {
            // Tangani kasus di mana kode_depresi tidak ditemukan (misalnya, lempar error atau set judul default)
            return redirect()->back()->withErrors(['kode_depresi' => 'Kode Depresi tidak ditemukan.']);
        }

        // Buat entri baru di tabel artikel
        Artikel::create([
            'kode_depresi' => $request->kode_depresi,
            'judul' => $judul,
            'isi' => $request->isi,
            'url_gambar' => "https://source.unsplash.com/1600x900/?{$judul}"
        ]);

        // Redirect atau lakukan sesuatu setelah penyimpanan berhasil
        return redirect()->route('keterangan.index')->with('success', 'Keterangan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtikelRequest  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        //
    }
}
