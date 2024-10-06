<?php

use App\Http\Controllers\StudentController;
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


Route::prefix('student')
    ->as('student.')
    ->group(function () {
        Route::get('/',[StudentController::class,'index'])->name('index');
        Route::get('/create',[StudentController::class,'create'])->name('create');
        Route::get('/{id}/show',[StudentController::class,'show'])->name('show');
        Route::post('/store',[StudentController::class,'store'])->name('store');
        Route::get('/{id}/edit',[StudentController::class , 'edit'])->name('edit');
        Route::put('/{id}/update',[StudentController::class , 'update'])->name('update');
        Route::delete('/{id}/destroy',[StudentController::class , 'destroy'])->name('destroy');
    });