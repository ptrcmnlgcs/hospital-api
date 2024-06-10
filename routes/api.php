<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Routes for managing patients
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get', [PatientController::class, 'index']); // Get all patients
    Route::post('/add', [PatientController::class, 'store']); // Create a new patient
    Route::get('/show/{id}', [PatientController::class, 'show']); // Get a single patient
    Route::put('/update/{id}', [PatientController::class, 'update']); // Update a patient
    Route::delete('/delete/{id}', [PatientController::class, 'destroy']); // Delete a patient
});
