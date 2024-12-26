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
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/drafts', [PostController::class, 'drafts'])->name('posts.drafts');
Route::post('comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::patch('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
Route::delete('comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');
Route::get('comments/approve', [CommentController::class, 'approvePage'])->name('comments.approve.page');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::resource('posts', PostController::class)->except(['show']);
Route::resource('comments', CommentController::class)->only(['edit', 'update']);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/comments/moderate', [CommentController::class, 'moderate'])->name('comments.moderate');

Route::post('posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
Route::put('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');Route::put('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
