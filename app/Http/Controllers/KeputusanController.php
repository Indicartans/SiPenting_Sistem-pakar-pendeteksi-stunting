<?php

namespace App\Http\Controllers;

use App\Models\Keputusan;
use App\Http\Requests\StoreKeputusanRequest;
use App\Http\Requests\UpdateKeputusanRequest;
use App\Models\Gejala;
use App\Models\TingkatDepresi;

class KeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('pakar');

        $pengetahuan = Keputusan::with(['gejala', 'depresi'])->paginate(15);
        $penyakit = TingkatDepresi::all();
        $gejala = Gejala::all();
        return view('admin.pengetahuan.pengetahuan', compact('pengetahuan', 'penyakit', 'gejala'));
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
     * @param  \App\Http\Requests\StoreKeputusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeputusanRequest $request)
    {
        // dd($request->all());
        $this->authorize('pakar');

        $valid = $request->validate([
            'kode_depresi' => 'required',
            'kode_gejala' => 'required',
            'mb' => 'required|numeric',
            'md' => 'required|numeric'
        ]);

        Keputusan::create($valid);
        return redirect()->route('pengetahuan.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Keputusan telah ditambahkan
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $keputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keputusan $keputusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeputusanRequest  $request
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeputusanRequest $request, $keputusan)
    {
        // Debug untuk memastikan data request diterima dengan benar
        // dd($request->all(), $keputusan);
        $this->authorize('pakar');
        // Validasi data yang diterima
        $valid = $request->validate([
            'kode_depresi' => 'required',
            'kode_gejala' => 'required',
            'mb' => 'required|numeric',
            'md' => 'required|numeric'
        ]);

        // Debug untuk memastikan data validasi
        // dd($valid);

        // Update instance model $keputusan dengan data yang sudah divalidasi
        $update = Keputusan::find($keputusan)->update($valid);
        if ($update) {
            return redirect()->route('pengetahuan.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">Keputusan telah diupdate</div>');
        }
        return redirect()->route('pengetahuan.index')->with('pesan', '<div class="alert alert-warning p-3 mt-3" role="alert">Keputusan gagal diupdate</div>');

        // Debug untuk memastikan data telah diupdate
        // dd($keputusan);

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('pengetahuan.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">
        keputusan telah diperbarui
        </div>');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($keputusan)
    {
        // dd($keputusan);
        $this->authorize('pakar');
        Keputusan::find($keputusan)->delete();
        return redirect()->route('pengetahuan.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        pengetahuan telah dihapus
        </div>');
    }
}
