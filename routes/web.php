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


Route::get('/TodoList', [TodoListController::class, 'index'])->name('TodoList')->middleware(['auth:sanctum','verified']);  
Route::post('/AddTodoList', [TodoListController::class, 'store'])->name('AddTodoList')->middleware(['auth:sanctum','verified']);
Route::get('/TodoDelete/{id}', [TodoListController::class, 'destroy'])->name('destroy')->middleware(['auth:sanctum','verified']);
Route::post('/TodoUpdate/{id}', [TodoListController::class, 'update'])->name('update')->middleware(['auth:sanctum','verified']);
Route::get('/edit/{id}', [TodoListController::class, 'edit'])->name('edit')->middleware(['auth:sanctum','verified']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
