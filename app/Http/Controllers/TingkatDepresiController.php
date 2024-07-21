<?php

namespace App\Http\Controllers;

use App\Models\TingkatDepresi;
use App\Http\Requests\StoreTingkatDepresiRequest;
use App\Http\Requests\UpdateTingkatDepresiRequest;

class TingkatDepresiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('pakar');

        return view('admin.depresi.depresi', [
            'depresi' => TingkatDepresi::all()
        ]);
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
     * @param  \App\Http\Requests\StoreTingkatDepresiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTingkatDepresiRequest $request)
    {
        $this->authorize('pakar');

        $valid = $request->validate([
            'kode_depresi' => 'required|unique:tingkat_depresi,kode_depresi',
            'depresi' => 'required'
        ]);
        TingkatDepresi::create($valid);
        return redirect()->route('depresi.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar Depresi telah ditambahkan
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TingkatDepresi  $tingkatDepresi
     * @return \Illuminate\Http\Response
     */
    public function show(TingkatDepresi $tingkatDepresi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TingkatDepresi  $tingkatDepresi
     * @return \Illuminate\Http\Response
     */
    public function edit(TingkatDepresi $tingkatDepresi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTingkatDepresiRequest  $request
     * @param  \App\Models\TingkatDepresi  $tingkatDepresi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTingkatDepresiRequest $request, $tingkatDepresi)
    {
        $this->authorize('pakar');

        $valid = $request->validate([
            'depresi' => 'required'
        ]);
        $status = TingkatDepresi::find($tingkatDepresi)->update($valid);
        if ($status) {
            return redirect()->route('depresi.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">Daftar Penyakit telah diupdate</div>');
        }
        return redirect()->route('depresi.index')->with('pesan', '<div class="alert alert-warning p-3 mt-3" role="alert">Daftar Penyakit gagal diupdate</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TingkatDepresi  $tingkatDepresi
     * @return \Illuminate\Http\Response
     */
    public function destroy($tingkatDepresi)
    {
        $this->authorize('pakar');

        // dd($tingkatDepresi);
        TingkatDepresi::find($tingkatDepresi)->delete();
        return redirect()->route('depresi.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">
        Daftar Penyakit telah dihapus
        </div>');
    }
}
