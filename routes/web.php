<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Employee\EmployeeForm;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/employee-form', EmployeeForm::class)->name('employee-form');


require __DIR__.'/auth.php';
