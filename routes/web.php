<?php

use App\Http\Controllers\JsonDataController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/data', [JsonDataController::class, 'index'])->name('jsondata.index');
// Route::post('/data', [JsonDataController::class, 'store'])->name('jsondata.store');
// Route::put('/data/{id}', [JsonDataController::class, 'update'])->name('jsondata.update');
// Route::delete('/data/{id}', [JsonDataController::class, 'destroy'])->name('jsondata.destroy');

Route::get('/data', [JsonDataController::class, 'index'])->name('jsondata.index');
Route::get('/data/create', [JsonDataController::class, 'create'])->name('jsondata.create');
Route::post('/data', [JsonDataController::class, 'store'])->name('jsondata.store');
Route::get('/data/{id}', [JsonDataController::class, 'show'])->name('jsondata.show');
Route::get('/data/{id}/edit', [JsonDataController::class, 'edit'])->name('jsondata.edit');
Route::put('/data/{id}', [JsonDataController::class, 'update'])->name('jsondata.update');
Route::delete('/data/{id}', [JsonDataController::class, 'destroy'])->name('jsondata.destroy');
