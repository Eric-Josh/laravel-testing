<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\paypalController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stripe', [PaymentController::class, 'index'])->name('stripe');
Route::post('/payment', [PaymentController::class, 'payment']);

Route::get('/paypal', function() {
    return view('paypal');
});

Route::get('payment', [PaypalPaymentController::class, 'payment'])->name('payment');
Route::get('cancel', [PaypalPaymentController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PaypalPaymentController::class, 'success'])->name('payment.success');


// Now Testing with league/omnipay omnipay/paypal package
Route::view('/pp','paypal.index')->name('index');	
Route::view('/pageFail','paypal.paymentFail')->name('pageFail');
Route::view('/pageSuccess','paypal.success')->name('pageSuccess');
Route::post('/pay', [paypalController::class, 'pay'])->name('payment');
Route::get('/success', [paypalController::class, 'success']);
Route::get('/error', [paypalController::class, 'error']);