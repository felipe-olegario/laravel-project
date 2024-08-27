<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VaccineController;

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{cpf}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{cpf}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{cpf}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{cpf}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('employees/{cpf}/add-vaccine', [EmployeeController::class, 'addVaccine'])->name('employees.addVaccine');
Route::post('employees/{cpf}/store-vaccine', [EmployeeController::class, 'storeVaccine'])->name('employees.storeVaccine');

Route::get('/vaccines', [VaccineController::class, 'index'])->name('vaccines.index');
Route::get('/vaccines/create', [VaccineController::class, 'create'])->name('vaccines.create');
Route::post('/vaccines', [VaccineController::class, 'store'])->name('vaccines.store');
Route::get('/vaccines/{id}', [VaccineController::class, 'show'])->name('vaccines.show');
Route::get('/vaccines/{id}/edit', [VaccineController::class, 'edit'])->name('vaccines.edit');
Route::put('/vaccines/{id}', [VaccineController::class, 'update'])->name('vaccines.update');
Route::delete('/vaccines/{id}', [VaccineController::class, 'destroy'])->name('vaccines.destroy');