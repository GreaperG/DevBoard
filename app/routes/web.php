<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProjectController::class);
    Route::resource('projects.tasks', TaskController::class);
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::post('/projects/{project}/invite/{user}', [ProjectController::class, 'addMember'])->name('projects.addMember');
    Route::get('/projects/{project}/invite', [ProjectController::class, 'invite'])->name('projects.invite');
    Route::delete('/projects/{project}/remove/{user}', [ProjectController::class, 'removeMember'])->name('projects.removeMember');
    Route::get('/projects/{project}/remove', [ProjectController::class, 'remove'])->name('projects.remove');
    Route::get('/overview', [ProjectController::class, 'overview'])->name('overview');
});
require __DIR__.'/auth.php';
