<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApipediaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main dashboard route
Route::get('/', [ApipediaController::class, 'index'])->name('apipedia.index');

// Individual page routes
Route::get('/documentation', [ApipediaController::class, 'showDocumentation'])->name('apipedia.documentation');
Route::get('/apipedia', [ApipediaController::class, 'showApipedia'])->name('apipedia.apipedia');
Route::get('/waconsole', [ApipediaController::class, 'showWaconsole'])->name('apipedia.waconsole');
Route::get('/start', [ApipediaController::class, 'showStart'])->name('apipedia.start');

// Form flow routes
Route::post('/choose-method', [ApipediaController::class, 'chooseMethod'])->name('apipedia.choose-method');
Route::get('/form/{method?}', [ApipediaController::class, 'showForm'])->name('apipedia.show-form');
Route::post('/execute-method', [ApipediaController::class, 'executeMethod'])->name('apipedia.execute-method');
