<?php

use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\PresenceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
 return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::get('register', [AdminAuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
            Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');

       
        Route::resource('products', ProductController::class);
        Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
        Route::get('customers', [AdminCustomerController::class, 'index'])->name('customers.index');
            Route::get('/customers/{id}', [AdminCustomerController::class, 'show'])->name('customers.show');
    });
});


Route::prefix('customer')->group(function () {
    Route::get('login', [CustomerAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [CustomerAuthController::class, 'login']);
    Route::get('register', [CustomerAuthController::class, 'showRegister'])->name('customer.register');
    Route::post('register', [CustomerAuthController::class, 'register']);

    Route::middleware('auth:customer')->group(function () {

         Route::post('/orders', [OrderController::class, 'store'])
         ->name('customer.orders.store');
        Route::get('dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');
        Route::post('logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
    });
});


