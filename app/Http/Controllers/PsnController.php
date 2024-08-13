<?php

namespace App\Http\Controllers;

use App\Models\Psn;
use App\Http\Requests\StorePsnRequest;
use App\Http\Requests\UpdatePsnRequest;

class PsnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('psn.index');
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
     * @param  \App\Http\Requests\StorePsnRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePsnRequest $request)
    {
        // dd($request->all());ss
        $request->validate([
            'pelapor' => 'required',
            'nama' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'jentik_nyamuk' => 'required',
            // 'penyakit' => 'required',
        ]);

        Psn::create([
            'pelapor' => $request->pelapor,
            'nama' => $request->nama,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'jentik_nyamuk' => $request->jentik_nyamuk,
            'penyakit' => $request->penyakit,
            'jumlah' => $request->jumlah
        ]);
        return redirect()->route('psn.index')->with('pesan', '<div class="alert alert-success p-3 mt-3 text-center" role="alert">
       Laporan telah terkirim
        </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Psn  $psn
     * @return \Illuminate\Http\Response
     */
    public function show(Psn $psn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Psn  $psn
     * @return \Illuminate\Http\Response
     */
    public function edit(Psn $psn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePsnRequest  $request
     * @param  \App\Models\Psn  $psn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePsnRequest $request, Psn $psn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Psn  $psn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Psn $psn)
    {
        //
    }
}
