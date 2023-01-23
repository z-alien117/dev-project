<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;


Route::group(['prefix' => 'functions', 'as' => 'functions.'], function(){

    Route::get('clients_data', [ClientsController::class, 'index'])->name('clients_data');
    Route::get('clients/form', [ClientsController::class, 'create'])->name('clients_form');
    Route::post('clients', [ClientsController::class, 'store'])->name('store_client');
    Route::get('clients/{client}', [ClientsController::class, 'edit'])->name('edit_client');
    Route::put('clients/{client_update}', [ClientsController::class, 'update'])->name('update_client');
});