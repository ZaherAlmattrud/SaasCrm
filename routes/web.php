<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/contact-us', 'contact')->name('contact');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/leads' , [LeadController::class , 'index'])->name('leads.index');
    // Route::get('/leads/create' , [LeadController::class , 'create'])->name('leads.create');
    // Route::post('/leads/store' , [LeadController::class , 'store'])->name('leads.store');

    Route::controller(LeadController::class)->group(function () {

        Route::get('/leads', 'index')->name('leads.index');
        Route::get('/leads/create', 'create')->name('leads.create');
        Route::post('/leads', 'store')->name('leads.store');
        Route::get('/leads/{lead}', 'show')->name('leads.show');
        Route::get('/leads/{lead}/edit', 'edit')->name('leads.edit');
        Route::put('/leads/{lead}', 'update')->name('leads.update');
        Route::delete('/leads/{lead}', 'destroy')->name('leads.delete');
    });
});
