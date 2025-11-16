<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoicePembelian;

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
    return view('dashboard');
});


Route::post('/kirim-invoice', function () {

    $email = 'pywardenbz@gmail.com';

    try {
        Mail::to($email)->send(new InvoicePembelian());
        return back()->with('success', 'Invoice berhasil dikirim!');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal kirim email: ' . $e->getMessage());
    }
    
});

Route::get('/cek-mail', function () {
    return config('mail.mailers.smtp.host');
});

Route::get('/test-email', function () {
    try {
        Mail::to('alamat-email-tes@gmail.com')->send(new InvoicePembelian());
        return "✅ Email berhasil dikirim (cek inbox/spam)";
    } catch (Exception $e) {
        return "❌ Error: " . $e->getMessage();
    }
});

