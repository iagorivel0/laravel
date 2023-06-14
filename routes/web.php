<?php

use App\Http\Controllers\CarrinhoControler;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
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

Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');

Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoControler::class, 'carrinhoLista'])->name('site.carrinho');

Route::post('/carrinho', [CarrinhoControler::class, 'adicionaCarrinho'])->name('site.addCarrinho');

Route::post('/remover', [CarrinhoControler::class, 'removeCarrinho'])->name('site.removeCarrinho');

Route::post('/atualizar', [CarrinhoControler::class, 'atualizaCarrinho'])->name('site.atualizaCarrinho');

Route::get('/limpar', [CarrinhoControler::class, 'limparCarrinho'])->name('site.limparCarrinho');

Route::view('/login', 'login.form')->name('login.form');

Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');