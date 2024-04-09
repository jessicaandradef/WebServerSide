<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;


Route::get('/', [IndexController::class, 'welcome'])->name('home.welcome');

Route::get('/home', [IndexController::class, 'homePage'])->name('home.index');

Route::get('/hello', [IndexController::class, 'hello'])->name('home.hello');

Route::get('/hello/{name}', [UserController::class, 'helloUser']);

Route::get('/users', [UserController::class, 'users'])->name('users.all');

Route::get('/tasks', [IndexController::class, 'tasks'])->name('tasks.all');

//rota fallback - o que será mostrado caso o user digitar uma rota que não existe;
Route::fallback([IndexController::class, 'fe']);

