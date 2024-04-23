<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TasksController;


Route::get('/', [IndexController::class, 'welcome'])->name('home.welcome');

Route::get('/home', [IndexController::class, 'homePage'])->name('home.index');

Route::get('/hello', [IndexController::class, 'hello'])->name('home.hello');

Route::get('/hello/{name}', [UserController::class, 'helloUser']);

Route::get('/users', [UserController::class, 'users'])->name('users.all');

Route::get('/user/{id}', [UserController::class, 'viewUser']) ->name ('users.view');
//quando estiver registado a rota vai a função 'viewUser';

Route::get('/add-user', [UserController::class, 'addUser']) ->name ('users.add');
//rota que nao retorna nada mas que quando chamada insere um utilizador no BD
//fazendo operações com o QueryBuilder

Route::get('/delete-user/{id}', [UserController::class, 'deleteUser']) ->name ('users.delete');


Route::get('/tasks', [TasksController::class, 'tasks'])->name('tasks.all'); //'tasks' é o nome da função

Route::get('/addTasks', [TasksController::class, 'addTasks'])->name('tasks.all');

//rota fallback - o que será mostrado caso o user digitar uma rota que não existe;
Route::fallback([IndexController::class, 'fe']);

