<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AiRecommendationController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UkmManagementController;
use App\Http\Controllers\Admin\ArticleManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\CommentManagementController;
// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// UKM Routes
Route::get('/ukm', [UkmController::class, 'index'])->name('ukm.index');
Route::get('/ukm/{id}', [UkmController::class, 'show'])->name('ukm.show');

// Article Routes
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{id}', [ArticleController::class, 'show'])->name('articles.show');

// AI Recommendation Routes
Route::get('/ai-minat-bakat', [AiRecommendationController::class, 'index'])->name('ai.recommendation');

// Game Routes
Route::get('/game-3d', [GameController::class, 'index'])->name('game.3d');

// About Routes
Route::get('/tentang', [AboutController::class, 'index'])->name('about');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // UKM Management
    Route::get('/ukm', [UkmManagementController::class, 'index'])->name('admin.ukm.index');
    Route::get('/ukm/create', [UkmManagementController::class, 'create'])->name('admin.ukm.create');
    Route::post('/ukm', [UkmManagementController::class, 'store'])->name('admin.ukm.store');
    Route::get('/ukm/{id}/edit', [UkmManagementController::class, 'edit'])->name('admin.ukm.edit');
    Route::put('/ukm/{id}', [UkmManagementController::class, 'update'])->name('admin.ukm.update');
    Route::delete('/ukm/{id}', [UkmManagementController::class, 'destroy'])->name('admin.ukm.destroy');
    
    // Article Management
    Route::get('/artikel', [ArticleManagementController::class, 'index'])->name('admin.articles.index');
    Route::get('/artikel/create', [ArticleManagementController::class, 'create'])->name('admin.articles.create');
    Route::post('/artikel', [ArticleManagementController::class, 'store'])->name('admin.articles.store');
    Route::get('/artikel/{id}/edit', [ArticleManagementController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/artikel/{id}', [ArticleManagementController::class, 'update'])->name('admin.articles.update');
    Route::delete('/artikel/{id}', [ArticleManagementController::class, 'destroy'])->name('admin.articles.destroy');
    
    // User Management
    Route::get('/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserManagementController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserManagementController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

        // Comment Management
    Route::get('/comments', [CommentManagementController::class, 'index'])->name('admin.comments.index');
    Route::get('/comments/{id}/edit', [CommentManagementController::class, 'edit'])->name('admin.comments.edit');
    Route::put('/comments/{id}', [CommentManagementController::class, 'update'])->name('admin.comments.update');
    Route::delete('/comments/{id}', [CommentManagementController::class, 'destroy'])->name('admin.comments.destroy');
});