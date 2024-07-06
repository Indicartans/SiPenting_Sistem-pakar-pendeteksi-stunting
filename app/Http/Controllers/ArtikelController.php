<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Models\TingkatDepresi;
use Clockwork\Request\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keterangan = Artikel::with('depresi')->get();
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
        // ddd($request);
        $validatedData = $request->validate([
            'kode_depresi' => 'required',
            // 'judul' => 'required',
            'isi' => 'required',
            'saran' => 'required',
            'url_gambar' => 'image'
        ]);


        // Cari entri berdasarkan kode_depresi
        $penyakit = TingkatDepresi::where('kode_depresi', $request->kode_depresi)->first();

        // Jika penyakit ditemukan, ambil judulnya
        if ($penyakit) {
            $judul = $penyakit->depresi;
            // dd($judul);
        } else {
            // Tangani kasus di mana kode_depresi tidak ditemukan
            return redirect()->back()->withErrors(['kode_depresi' => 'Kode Depresi tidak ditemukan.']);
        }

        $validatedData['judul'] = $judul;

        if ($request->file('url_gambar')) {
            $validatedData['url_gambar'] = $request->file('url_gambar')->store('artikel-images', 'public');
        }

        // dd($validatedData);

        // Buat entri baru di tabel artikel
        Artikel::create($validatedData);

        // Redirect  setelah penyimpanan berhasil
        return redirect()->route('keterangan.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Keterangan telah ditambahkan
        </div>');
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
    public function update(UpdateArtikelRequest $request, $artikel)
    {
        // dd($request->all());

        // Validasi data yang diterima
        $valid = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'saran' => 'required',
            'url_gambar' => 'image'
        ]);

        if ($request->file('url_gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $valid['url_gambar'] = $request->file('url_gambar')->store('artikel-images', 'public');
        }

        // Debug untuk memastikan data validasi
        // dd($valid);

        // Update instance model $keputusan dengan data yang sudah divalidasi
        $update = Artikel::find($artikel)->update($valid);
        if ($update) {
            return redirect()->route('keterangan.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">Artikel telah diupdate</div>');
        }
        return redirect()->route('pengetahuan.index')->with('pesan', '<div class="alert alert-warning p-3 mt-3" role="alert">Artikel gagal diupdate</div>');

        // Debug untuk memastikan data telah diupdate
        // dd($keputusan);

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('keterangan.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        Artikel telah diperbarui
        </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Ambil artikel berdasarkan ID
        $artikel = Artikel::find($id);

        // Jika artikel tidak ditemukan, kembalikan pesan error
        if (!$artikel) {
            return redirect()->route('keterangan.index')->with('pesan', '<div class="alert alert-warning p-3 mt-3" role="alert">Artikel tidak ditemukan</div>');
        }

        // Simpan URL gambar sebelum artikel dihapus
        $url_gambar = $artikel->url_gambar;

        // Hapus artikel dari database
        $artikel->delete();

        // Jika ada gambar, hapus dari storage
        if ($url_gambar) {
            Storage::disk('public')->delete($url_gambar);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('keterangan.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">Keterangan telah dihapus</div>');
    }
}
