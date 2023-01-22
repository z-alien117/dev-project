<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;


Route::group(['prefix' => 'functions', 'as' => 'functions.'], function(){

    Route::get('clients_data', [ClientsController::class, 'index'])->name('clients_data');
});