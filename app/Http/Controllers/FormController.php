<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\KondisiUser;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

class FormController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

        $usia = $request->usia;
        // dd($usia);

        $data = [];
        if ($usia == 1) {
            $exception = ['G009', 'G028', 'G008'];
        } elseif ($usia == 2) {
            $exception = ['G005', 'G002'];
        }

        // $data = Gejala::all();
        // dd($data->kode_gejala);
        // $filteredData = $data->except($exception);
        $gejala = Gejala::where('kode_gejala', '<>', $exception)->get();
        $kondisi_user = KondisiUser::all();
        // dd($kondisi_user->all());

        return view('form', compact('gejala', 'kondisi_user'));
    }
}
