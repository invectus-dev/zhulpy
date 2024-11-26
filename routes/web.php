<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Models\kategori;
use App\Models\produk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data['all'] = produk::all();
    $data['jual'] = produk::where('jenis', 'jual')->get();
    $data['sewa'] = produk::where('jenis', 'sewa')->get();
    $data['kat'] = kategori::with('produk')->get();
    return view('welcome')->with($data);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// hanya admin yang bisa mengakses halaman admin
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [PageController::class, 'index'])->name('admin');
    Route::post('/tambah', [PageController::class, 'tambah'])->name('addQuota');
    Route::post('/tambahKategori', [PageController::class, 'tambahKategori'])->name('tambahKategori');
    Route::delete('/hapusKategori/{id}', [PageController::class, 'hapusKategori'])->name('hapusKategori');
});

Route::post('/jual', [productController::class, 'create'])->name('selling');
Route::get('/preview/{id}', [productController::class, 'preview'])->name('look');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/tambahNo', [ProfileController::class, 'tambahNo'])->name('tambahNo');

    Route::get('/postingan-user', [productController::class, 'postingan'])->name('postingan');
    Route::post('/habis', [productController::class, 'habis'])->name('habis');
});


require __DIR__ . '/auth.php';
