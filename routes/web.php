<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('index');
})->name('home');
 // Route::get('/student',[StudentController::class,'index'])->name('student.index');
 // Route::get('/student/create',[StudentController::class,'create'])->name('student.create');
 // Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
 // Route::get('/student/{student}/edit',[StudentController::class,'edit'])->name('student.edit');
 // Route::put('/student/{student}/udpate',[StudentController::class,'update'])->name('student.update');
 // Route::get('/student/{student}/show',[StudentController::class,'show'])->name('student.show');
 Route::get('/student/{student}/delete',[StudentController::class,'delete'])->name('student.delete');
 
 Route::resource('students', StudentController::class);
 
 // Route::resources('student','StudentController')->name('student');