<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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

// Route::get('', function () {
//     return view('welcome');
// });


// Registration routes
Route::get('/', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
Route::get('/blog', [PostController::class, 'create'])->name('blog-posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('blog-posts.store');
Route::get('/blogposts/{article}/edit', [PostController::class, 'edit'])->name('blog-posts.edit');
Route::put('/blogposts/{id}', [PostController::class, 'update'])->name('blog-posts.update');
Route::delete('/blogposts/{id}', [PostController::class, 'destroy'])->name('blog-posts.destroy');
Route::patch('/blogposts/{id}/update-status', [PostController::class, 'updateStatus'])->name('blog-posts.update-status');
});
