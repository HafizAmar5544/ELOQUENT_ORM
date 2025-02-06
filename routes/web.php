<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/add/form/data', [StudentController::class,'index']);