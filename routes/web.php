<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/login');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('logout', [AuthController::class, 'signOut'])->name('login.signOut');

Route::middleware(['auth'])->group(function () {
    Route::resource('usuarios', UserController::class);
    Route::get('/', [UserController::class, 'index'])->name('users.index');
});


Route::prefix('painel')->middleware(['auth'])->group(function() {

    //Usuários

    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');

    Route::get('/usuarios/buscar', [UserController::class, 'searchForUser'])->name('users.search');

    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.delete');

    Route::get('/usuarios/cadastrar', [UserController::class, 'create'])->name('register');
    Route::post('/usuarios/cadastrar', [UserController::class, 'store'])->name('register.submit');

    Route::get('/usuarios/editar/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/usuarios/editar/{id}', [UserController::class, 'update'])->name('users.update');


    // Categorias

    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::get('/categories/buscar', [CategoryController::class, 'searchForCategory'])->name('categories.search');

    Route::get('/categorias/cadastrar', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categorias/cadastrar', [CategoryController::class, 'store'])->name('categories.submit');

    Route::get('/categorias/editar/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categorias/editar/{id}', [CategoryController::class, 'update'])->name('categories.update');
});