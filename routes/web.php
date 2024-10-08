<?php

use App\Models\User;
use App\Models\Gejala;
use App\Models\Diagnosa;
use App\Models\KondisiUser;
use Illuminate\Http\Request;
use App\Models\TingkatDepresi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeputusanController;
use App\Http\Controllers\HomeArtikelController;
// use Clockwork\Request\Request;
use App\Http\Controllers\DataKesehatanController;
use App\Http\Controllers\KelurahanPsnController;
use App\Http\Controllers\PsnController;
use App\Http\Controllers\TingkatDepresiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/chart', [DashboardController::class, 'chartData']);


    Route::get('/dashboard/admin', function () {
        $data = [
            'user' => User::all()
        ];
        return view('admin.list_admin', $data);
    });

    Route::get('/dashboard/add_admin', function () {
        return view('admin.add_admin');
    });

    Route::get('/home', function () {
        return redirect('/dashboard');
    });

    Route::resource('/gejala', GejalaController::class);
    Route::resource('/depresi', TingkatDepresiController::class);
    Route::resource('/spk', DiagnosaController::class)->only('index');
    Route::resource('/keterangan', ArtikelController::class);
    Route::resource('/keterangan', ArtikelController::class);
    Route::resource('/pengetahuan', KeputusanController::class);
    Route::resource('/admin', UserController::class);
});

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'index']);

Route::get('/form-faq', function () {
    $data = [
        'gejala' => Gejala::all(),
        'kondisi_user' => KondisiUser::all()
    ];

    return view('faq', $data);
})->name('cl.form');



Route::resource('/spk', DiagnosaController::class);
Route::get('/spk/result/{diagnosa_id}', [DiagnosaController::class, 'diagnosaResult'])->name('spk.result');
Route::resource('/artikel', HomeArtikelController::class);
Route::get('artikel/{slug}', [HomeArtikelController::class, 'show'])->name('artikel.show');

Route::resource('/kesehatan', DataKesehatanController::class);
Route::get('/kesehatan/data', [DataKesehatanController::class, 'getData'])->name('data.anak');
Route::get('/downloadpdf', [DataKesehatanController::class, 'generatePDF'])->name('download.pdf');

Route::resource('/psn', PsnController::class);
Route::resource('/laporan', KelurahanPsnController::class);

Route::get('/tes', function () {
    Artisan::call('storage:link');
});

Auth::routes();
