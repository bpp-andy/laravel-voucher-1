<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    UserVoucherController,
    AdminController
};
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/my-vouchers', [UserVoucherController::class, 'index'])->name('my-vouchers');
    Route::get('/u/vouchers', [UserVoucherController::class, 'getVouchers'])->name('get-vouchers');
    Route::post('/u/vouchers', [UserVoucherController::class, 'addVoucher'])->name('new-voucher');
    Route::delete('/u/vouchers/{id}', [UserVoucherController::class, 'removeVoucher'])->name('rm-voucher');

    Route::middleware(['is_admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/datasets', [AdminController::class, 'datasets'])->name('admin-data');
    });

});
