<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubTaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');


Route::get('/projects/{project}/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
// Route::get('/removetasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks/{task}/subtasks', [SubTaskController::class, 'index'])->name('subtasks.index');
Route::get('/tasks/{task}/subtasks/create', [SubTaskController::class, 'create'])->name('subtasks.create');
Route::post('/tasks/{task}/subtasks', [SubTaskController::class, 'store'])->name('subtasks.store');
Route::get('/subtasks/{subtask}/edit', [SubTaskController::class, 'edit'])->name('subtasks.edit');
Route::put('/subtasks/{subTask}', [SubTaskController::class, 'update'])->name('subtasks.update');
Route::delete('/removesubtasks/{subtask}', [SubTaskController::class, 'destroy'])->name('subtasks.destroy');