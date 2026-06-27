<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/student/list', [StudentController::class, 'list']);

Route::get('/', function () {
    return view('welcome');
});
