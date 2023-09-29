<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendingPaymentController;

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

/*
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
*/

Route::get('/', [DashboardController::class, 'ViewTotalInvestment'])->name('dashboard');

// Customer All Route
Route::controller(CustomerController::class)->group(function() {
    Route::get('/customer/register-customer', 'ViewRegisterCustomer')->name('customer.newcustomer');
    Route::get('/customer/view-customer', 'ViewCustomer')->name('customer.viewcustomer');
    Route::post('/store/customer', 'StoreCustomer')->name('store.customer');

    Route::get('/edit/customer/{id}', 'EditCustomer')->name('edit.customer');
    Route::post('/update/customer', 'UpdateCustomer')->name('update.customer');
    Route::get('/delete/customer/{id}', 'DeleteCustomer')->name('delete.customer');

    Route::get('/customer/details/{id}', 'CustomerDetails')->name('customer.details');

    Route::post('/customer/addbalance', 'AddBalance')->name('customer.addbalance');    
    Route::post('/customer/makepayment', 'MakePayment')->name('customer.makepayment');
});

// Payment All Route
Route::controller(PaymentController::class)->group(function() {
    Route::get('/payment/view-payment', 'ViewPayments')->name('payment.viewpayments');
});

// Pending Payment All Route
Route::controller(PendingPaymentController::class)->group(function() {
    Route::get('/payment/view-pendingpayment', 'ViewPendingPayments')->name('payment.viewpendingpayments');
});
