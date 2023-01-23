<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductsController;


Route::group(['prefix' => 'functions', 'as' => 'functions.'], function(){

    // Clients routes
    Route::get('clients_data', [ClientsController::class, 'index'])->name('clients_data');
    Route::get('clients/form', [ClientsController::class, 'create'])->name('clients_form');
    Route::post('clients', [ClientsController::class, 'store'])->name('store_client');
    Route::get('clients/{client}', [ClientsController::class, 'edit'])->name('edit_client');
    Route::put('clients/{client_update}', [ClientsController::class, 'update'])->name('update_client');
    Route::delete('clients/{client}', [ClientsController::class, 'destroy'])->name('delete_client');

    // Products routes
    Route::get('products_data', [ProductsController::class, 'index'])->name('products_data');
    Route::get('products/form', [ProductsController::class, 'create'])->name('products_form');
    Route::post('products', [ProductsController::class, 'store'])->name('store_product');
    Route::get('products/{product}', [ProductsController::class, 'edit'])->name('edit_product');
    Route::put('products/{product_update}', [ProductsController::class, 'update'])->name('update_product');
    Route::delete('products/{product}', [ProductsController::class, 'destroy'])->name('delete_product');


});