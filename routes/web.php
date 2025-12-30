<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/category-hobby-list', [UserController::class, 'categoryHobbyList'])->name('category.hobby.list');

Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/delete', [UserController::class, 'delete'])->name('users.delete');

