<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class);


Route::get('/customer/list', [CustomerController::class, 'index'])->name('customers.index');

Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

Route::put('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');

Route::delete('/customers/destroy/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/add-customer', function () {
    return view('add-customer');
});

Route::post('/add-customer', [CustomerController::class, 'create'])->name('customers.create');


Route::resource('/customer', CustomerController::class);