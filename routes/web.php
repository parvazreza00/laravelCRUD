<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CrudController::class, 'ShowData']);
Route::get('/add-data', [CrudController::class, 'AddData']);
Route::post('/store-data', [CrudController::class, 'StoreData']);
Route::get('/edit-data/{id}', [CrudController::class, 'EditData']);
Route::post('/update-data/{id}', [CrudController::class, 'UpdateData']);
Route::get('/delete-data/{id}', [CrudController::class, 'DeleteData']);