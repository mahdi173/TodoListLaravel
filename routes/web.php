<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth:sanctum')->group(function () {
   
    Route::get('/TodoList', [TodoListController::class, 'index'])->name('TodoList');  
    Route::post('/AddTodoList', [TodoListController::class, 'store'])->name('AddTodoList');
    Route::get('/TodoDelete/{id}', [TodoListController::class, 'destroy'])->name('destroy');
    Route::post('/TodoUpdate/{id}', [TodoListController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [TodoListController::class, 'edit'])->name('edit');
    
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
