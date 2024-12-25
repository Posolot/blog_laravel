<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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
Route::get('/', [PostController::class, 'index'])->name('posts.index'); // Главная страница

Route::resource('posts', PostController::class); // Ресурсный маршрут для постов

Route::post('comments/{post}', [CommentController::class, 'store'])->name('comments.store'); // Роут для добавления комментариев
Route::patch('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::patch('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::post('posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
Route::post('posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
