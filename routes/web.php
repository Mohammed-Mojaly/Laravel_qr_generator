<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;

Route::get('/', [QrController::class, 'index'])->name('qr_builder');
Route::post('/qr_builder', [QrController::class, 'do_qr_bulider'])->name('do_qr_bulider');

Route::get('/phone', [QrController::class, 'phone'])->name('qr_phone');
Route::post('/qr_phone', [QrController::class, 'do_qr_phone'])->name('do_qr_phone');

Route::get('/email', [QrController::class, 'email'])->name('qr_email');
Route::post('/qr_email', [QrController::class, 'do_qr_email'])->name('do_qr_email');

Route::get('/sms', [QrController::class, 'sms'])->name('qr_sms');
Route::post('/qr_sms', [QrController::class, 'do_qr_sms'])->name('do_qr_sms');

Route::get('/geo', [QrController::class, 'geo'])->name('qr_geo');
Route::post('/qr_geo', [QrController::class, 'do_qr_geo'])->name('do_qr_geo');

Route::get('/link', [QrController::class, 'link'])->name('qr_link');
Route::post('/qr_link', [QrController::class, 'do_qr_link'])->name('do_qr_link');

Route::get('/wifi', [QrController::class, 'wifi'])->name('qr_wifi');
Route::post('/qr_wifi', [QrController::class, 'do_qr_wifi'])->name('do_qr_wifi');

