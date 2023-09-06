<?php

use App\Http\Controllers\PaymentController;
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

Route::get('/', [PaymentController::class, 'invoice']);
Route::get('/view-payment/{user_id}/{service_id}', [PaymentController::class, 'viewPayment'])->name('view.payment');

Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
