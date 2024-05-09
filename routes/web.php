<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OTPController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{record}/send', [MailController::class, 'approved'])->name('approved');
Route::get('/{record}/cancel', [MailController::class, 'cancelled'])->name('cancelled');
Route::get('/admin/register/otp/{userId}', [OTPController::class, 'otp'])->name('otp.show');
Route::get('/admin/register/otp-form/{userId}', function ($userId) {
    // Retrieve $userId from the route parameter
    return view('otp', ['userId' => $userId]);
})->name('otp');

Route::post('/verify-otp/{userId}', [OTPController::class, 'verify'])->name('verify-otp');
Route::get('/admin/register/otp/resend/{userId}', [OTPController::class, 'resend'])->name('otp.resend');
