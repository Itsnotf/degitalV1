<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\GejalaKePenyakitController;
use App\Http\Controllers\GejalaRuleController;
use App\Http\Controllers\KeputusanRuleController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PenyakitKeGejalaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\TampilGejalaController;
use App\Http\Controllers\TampilPenyakitController;
use App\Http\Controllers\TampilRuleController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ClientController::class,'home'])->name('home');

// matikan route ini jika .env email sudah di seting
Route::get('/forgot-password', function () {
    return redirect()->back();
})->name('password.request')->middleware(['guest']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/change-profile-avatar', [DashboardController::class, 'changeAvatar'])->name('change-profile-avatar');
    Route::delete('/remove-profile-avatar', [DashboardController::class, 'removeAvatar'])->name('remove-profile-avatar');
    Route::get('/shop', [ClientController::class, 'shop'])->name('shop');
    Route::get('/profileUser', [ClientController::class, 'profileUser'])->name('profileUser');
    Route::post('/cekout', [ClientController::class, 'cekout'])->name('cekout');
    Route::get('/transaksiUser', [ClientController::class, 'transaksiUser'])->name('transaksiUser');


    // route untuk superadmin jika diperlukan
    // Route::middleware(['can:superadmin'])->group(function () {
    //     Route::resources([
    //         'user' => UserController::class,
    //     ]);
    // });

    // route untuk admin
    Route::middleware(['can:admin'])->group(function () {
        Route::resources(['user' => UserController::class,]);
        Route::resources(['produk' => ProdukController::class,]);
        Route::resources(['transaksi' => TransaksiController::class,]);
        Route::put('/transaksiUpdate/{id}', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
        Route::resources(['pembayaran' => PembayaranController::class,]);
    });

    // route untuk user
    Route::middleware(['can:user'])->group(function () {
        //
    });
});
