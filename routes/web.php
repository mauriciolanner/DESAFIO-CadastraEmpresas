<?php

use App\Http\Controllers\EmpEmpresaController;
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

//rotas Empresa
Route::middleware(['auth:sanctum', 'verified'])->controller(EmpEmpresaController::class)->group(function () {
    Route::get('/empresas', 'index')->name('empresas');
    Route::get('/empresa/{id}', 'show')->name('empresas.show');
    Route::put('/empresa/deleta/{id}', 'destroy')->name('empresas.destroy');
    Route::post('/empresa/novo', 'store')->name('empresa.store');
    Route::put('/empresa/edita', 'edit')->name('empresa.edit');
    Route::put('/empresa/edita/especial/{id}', 'updateSpecial')->name('empresa.special');
});

//rotas documentos
Route::middleware(['auth:sanctum', 'verified'])->controller(DocDocumentoController::class)->group(function () {
    Route::post('/documento/criar', 'store')->name('documento.criar');
});
