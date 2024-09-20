<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('customers', CustomerController::class);
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.list');
Route::get('/customer/list', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/add-customer', function () {
    return view('admin.customer.add-customer');
});
Route::post('/add-customer', [CustomerController::class, 'create'])->name('customers.create');
Route::resource('/customer', CustomerController::class);



Route::get('/', function () {
    return redirect('/supplierlist');
});
// Route to show the add supplier form
Route::get('/addsupplier', [SupplierController::class, 'create'])->name('supplier.create');
// Route to handle form submission to add a supplier
Route::post('/suppliers', [SupplierController::class, 'store'])->name('supplier.store');
// Route to show the supplier list and handle inline editing
Route::get('/supplierlist', [SupplierController::class, 'index'])->name('supplier.index');
// Route to update the supplier (from inline edit)
Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('supplier.update');
// Route to delete the supplier
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');


Route::resource('purchase', PurchaseController::class);
Route::get('/add-purchase', function () {
    return view('admin.purchase.add-purchase');
});



