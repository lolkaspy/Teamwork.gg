<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCreatorController;
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
    ->name('project.show');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news-page');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile')
    ->middleware('auth');

Route::post('/modal_project_store', [ProjectCreatorController::class, 'store'])->name('projectStore');
