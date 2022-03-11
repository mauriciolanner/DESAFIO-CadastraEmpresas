<?php

use App\Http\Controllers\EmpEmpresaController;
use App\Http\Controllers\DocDocumentoController;
use App\Http\Controllers\ImdImagemDocumentoController;
use App\Http\Controllers\EndEndereco;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Página inicial
    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');
});

//rotas EmpEmpresa
Route::middleware(['auth:sanctum', 'verified'])->controller(EmpEmpresaController::class)->group(function () {
    Route::get('/empresas', 'index')->name('empresas');
    Route::get('/empresa/{id}', 'show')->name('empresas.show');
    Route::put('/empresa/deleta/{id}', 'destroy')->name('empresas.destroy');
    Route::post('/empresa/novo', 'store')->name('empresa.store');
    Route::put('/empresa/edita', 'edit')->name('empresa.edit');
    Route::put('/empresa/edita/especial/{id}', 'updateSpecial')->name('empresa.special');
});

//rotas DocDocumentos
Route::middleware(['auth:sanctum', 'verified'])->controller(DocDocumentoController::class)->group(function () {
    Route::post('/documento/criar', 'store')->name('documento.criar');
    Route::put('/documento/deletar/{id}', 'destroy')->name('documento.deletar.pasta');
});

//rotas ImdImagemDocumentoController
Route::middleware(['auth:sanctum', 'verified'])->controller(ImdImagemDocumentoController::class)->group(function () {
    Route::post('/documento/enviar', 'store')->name('documento.enviar');
    Route::put('/documento/arquivo/deletar/{id}', 'destroy')->name('documento.deletar');
});

//rotas EndEndereco
Route::middleware(['auth:sanctum', 'verified'])->controller(ImdImagemDocumentoController::class)->group(function () {
    Route::post('/documento/enviar', 'store')->name('documento.enviar');
    Route::put('/documento/arquivo/deletar/{id}', 'destroy')->name('documento.deletar');
});
