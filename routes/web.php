<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCreatorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');

Route::get('/projects/{project}', [ProjectController::class, 'show'])
    ->name('projects.show');

Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
    ->name('projects.destroy');

Route::patch('/projects/{project}', [ProjectCreatorController::class, 'update'])
    ->name('projects.update');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile')
    ->middleware('auth');

Route::post('/modal_project_store', [ProjectCreatorController::class, 'store'])->name('projectStore');

Route::group(['prefix' => '/admin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy', 'show', 'create'])->names([
        'index' => 'admin.users.index',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
        'show' => 'admin.users.show',
        'create' => 'admin.users.create',
    ]);
    Route::resource('projects', ProjectController::class)->only(['index', 'edit', 'update', 'destroy', 'show', 'create'])->names([
        'index' => 'admin.projects.index',
        'edit' => 'admin.projects.edit',
        'update' => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
        'show' => 'admin.projects.show',
        'create' => 'admin.projects.create',
    ]);
    Route::resource('roles', RoleController::class)->only(['index', 'edit', 'update', 'destroy', 'show', 'create'])->names([
        'index' => 'admin.roles.index',
        'edit' => 'admin.roles.edit',
        'update' => 'admin.roles.update',
        'destroy' => 'admin.roles.destroy',
        'show' => 'admin.roles.show',
        'create' => 'admin.roles.create',
    ]);
    Route::resource('news', NewsController::class)->only(['index', 'edit', 'update', 'destroy', 'show', 'create'])->names([
        'index' => 'admin.news.index',
        'edit' => 'admin.news.edit',
        'update' => 'admin.news.update',
        'destroy' => 'admin.news.destroy',
        'show' => 'admin.news.show',
        'create' => 'admin.news.create',
    ]);
});
