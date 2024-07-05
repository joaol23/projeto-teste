<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContatoController::class, 'create'])->name('form-contato');
Route::get('/lista-contato', [ContatoController::class, 'list'])->name('lista_contato');
Route::get('/editar-contato', [ContatoController::class, 'edit'])->name('editar_contato');

Route::post('/criar-contato', [ContatoController::class, 'post'])->name('criar_contato');

Route::put('/alterar-contato', [ContatoController::class, 'put'])->name('alterar_contato');
