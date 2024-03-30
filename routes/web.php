<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
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

Route::get('/', function () {
    return view('auth.login');
});
// Auth
Route::get('/loginForm', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/loginVerify', [AuthController::class, 'loginVerify'])->name('loginVerify');
Route::get('/registerForm', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/registerProc', [AuthController::class, 'registerProc'])->name('registerProc');

Route::middleware(['auth'])->group(function () {
     //dashboard
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index');
    // Route::get('/dashboard/export', [dashboardController::class, 'export'])->name('dashboard.export');
    Route::get('/dashboard/export', [dashboardController::class, 'export'])->name('dashboard.export');

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //  user profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profileProc', [ProfileController::class, 'profileProc'])->name('profileProc');
    //  blog
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::resource('comments', CommentController::class);
    Route::post('/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/blogs/{blog}/comments', [CommentController::class, 'show'])->name('blogs.comments');
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
    //  movie API
    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
   

});
