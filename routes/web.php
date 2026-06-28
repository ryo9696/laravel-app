<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/student/list', [StudentController::class, 'list'])
        ->name('student.list');

    Route::get('/student/create', [StudentController::class, 'create'])
        ->name('student.create');

    Route::post('/student/store', [StudentController::class, 'store'])
        ->name('student.store');

    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])
        ->name('student.edit');

    Route::put('/student/{id}', [StudentController::class, 'update'])
        ->name('student.update');

    Route::delete('/student/{id}', [StudentController::class, 'destroy'])
        ->name('student.destroy');

});


require __DIR__.'/auth.php';
