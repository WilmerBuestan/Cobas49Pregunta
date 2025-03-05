<?php

use App\Http\Controllers\MateriaController;
use App\Http\Controllers\CuestionarioController;

Route::get('/', [MateriaController::class, 'index'])->name('materias.index');
Route::post('/materias', [MateriaController::class, 'store'])->name('materias.store');
Route::delete('/materias/{id}', [MateriaController::class, 'destroy'])->name('materias.destroy');
Route::post('/materias/{id}/upload', [MateriaController::class, 'uploadJson'])->name('materias.upload');
Route::get('/cuestionario/{id}', [CuestionarioController::class, 'index'])->name('cuestionario');
Route::post('/cuestionario/responder', [CuestionarioController::class, 'responder'])->name('cuestionario.responder');
