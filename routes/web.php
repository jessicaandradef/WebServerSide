<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GiftsController;
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

Route::get('/create-user', [UserController::class, 'createUser']) ->name ('create.user');

Route::post('/store-user', [UserController::class, 'storeUser']) ->name ('store.user');

Route::get('/delete-user/{id}', [UserController::class, 'deleteUser']) ->name ('users.delete');

//task router

Route::get('/tasks', [TasksController::class, 'tasks'])->name('tasks.all'); //'tasks' é o nome da função

Route::get('/create-task', [TasksController::class, 'createTask']) ->name('create.task');

Route::post('/store-task', [TasksController::class, 'storeTask']) ->name('store.task');

Route::get('/user/{id}', [TasksController::class, 'viewTask']) ->name ('task.view');


//Route::get('/tasks/{id}', [UserController::class, 'viewUser']) ->name ('users.view');


//Route::get('/addTasks', [TasksController::class, 'addTasks'])->name('tasks.all');

//gifts router

Route::get('/gifts', [GiftsController::class, 'gifts']) -> name('gifts.all');

Route::get('/gifts/{id}', [GiftsController::class, 'viewGift']) -> name('gifts.view');

Route::get('/delete-gifts/{id}', [GiftsController::class, 'deleteGift']) ->name ('gifts.delete');



//rota fallback - o que será mostrado caso o user digitar uma rota que não existe;
Route::fallback([IndexController::class, 'fe']);

