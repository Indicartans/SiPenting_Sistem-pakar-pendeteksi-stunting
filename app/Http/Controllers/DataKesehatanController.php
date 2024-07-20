<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Database\Factories\AnakFactory;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Termwind\Components\Dd;
use Yajra\DataTables\DataTables;
use PDF;

class DataKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        // if ($request->ajax) {

        $data = Anak::all();


        return view('kelurahan.dataKesehatan.index', compact('data'));
    }

    public function getData(Request $request)
    {
    }

    public function generatePDF()
    {
        $data = Anak::all();

        $pdf = PDF::loadView('kelurahan.dataKesehatan.data_kesehatanPDF', compact('data'));
        return $pdf->download('data-kesehatan.pdf');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function show(Anak $anak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function edit(Anak $anak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anak $anak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anak  $anak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anak $anak)
    {
        //
    }
}
