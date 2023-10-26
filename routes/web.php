<?php

use App\Http\Controllers\LogementController;
use App\Http\Controllers\SejourController;
use App\Models\Sejour;
use App\Models\Voyageur;
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
})->name('home');

Route::get('/logement', function () {
    return view('formLogement');
})->name('logement');
Route::post('/logement/store', [LogementController::class, 'enregistrement'])->name('logement.store');
Route::get('/logement/list', [LogementController::class, 'listLogement'])->name('logement.liste');
Route::delete('/logement/delete/{id}', [\App\Http\Controllers\LogementController::class, 'delete'])->name('logement.delete');
Route::put('/logement/update/{id}', [\App\Http\Controllers\LogementController::class, 'update'])->name('logement.update');
Route::get('/logement/edit/{id}', [LogementController::class, 'editToModification'])->name('logement.edit');


Route::get('/sejour', [SejourController::class, 'index'])->name('sejour');
Route::post('/sejour/store', [SejourController::class, 'store'])->name('sejour.store');
Route::get('/sejour/list', [SejourController::class, 'listSejour'])->name('sejour.liste');
Route::delete('/sejour/delete/{id}', [SejourController::class, 'delete'])->name('sejour.delete');
Route::put('/sejour/update/{id}', [SejourController::class, 'update'])->name('sejour.update');
Route::get('/sejour/edit/{id}', [SejourController::class, 'editToModification'])->name('sejour.edit');
