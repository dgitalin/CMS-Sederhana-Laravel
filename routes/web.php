<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminCommentController;

use App\Http\Controllers\Frontend\PostController as FrontendPostController;

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

Route::get('/articles', [FrontendPostController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [FrontendPostController::class, 'show'])->name('articles.show');
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/page/{slug}', [FrontendPageController::class, 'show'])->name('page.show');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/categories', CategoryController::class)->middleware('auth');
    Route::resource('admin/tags', TagController::class);
    Route::resource('admin/posts', PostController::class);
    Route::resource('admin/pages', PageController::class);

    Route::get('/admin/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');
    Route::post('/admin/comments/{comment}/approve', [AdminCommentController::class, 'approve'])->name('admin.comments.approve');
});

require __DIR__.'/auth.php';
