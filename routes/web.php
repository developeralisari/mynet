<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

// Person Routes
Route::get('/', [PersonController::class, 'index']);
Route::get('/person/add', [PersonController::class, 'add']);
Route::get('/person/update/{id}', [PersonController::class, 'update']);
Route::post('/person/save', [PersonController::class, 'save']);
Route::post('/person/store', [PersonController::class, 'store']);
Route::get('/person/delete/{id}', [PersonController::class, 'delete']);

// Address Routes
Route::get('/addresses', [AddressController::class, 'index']);
Route::get('/address/add', [AddressController::class, 'add']);
Route::get('/address/update/{id}', [AddressController::class, 'update']);
Route::post('/address/save', [AddressController::class, 'save']);
Route::post('/address/store', [AddressController::class, 'store']);
Route::get('/address/delete/{id}', [AddressController::class, 'delete']);
