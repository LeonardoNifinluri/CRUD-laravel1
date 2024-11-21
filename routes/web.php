<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('student.showAll');
});

Route::get('/help', function(){
    return 'ini adalah help';
});

Route::get('/getMyMethod', [StudentController::class, 'myMethod']);

Route::get('/getSecondMethod', [StudentController::class, 'secondMethod']);

Route::get('/identity', [StudentController::class, 'identity']);

Route::get('/home', [StudentController::class, 'homePage']);

//this is for show all students
Route::get('/allStudents', [StudentController::class, 'showAll'])->name('student.showAll');

//this is to fill the form
Route::get('/form', [StudentController::class, 'create'])->name('student.form');

//this is to store the data from the form
Route::post('/inputStudentData', [StudentController::class, 'store'])->name('student.store');

//this is to delete data
//'/student/{id}' will pass the id of row in student table (not same as student_id)
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

//this is to edit form data : try -> '/student/{student_id}/edit'
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');

//this is to update data
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');