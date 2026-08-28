<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contacto', [LeadController::class, 'store'])
    ->name('leads.store')
    ->middleware('throttle:5,1');

Route::get('/sitemap.xml', function () {
    return response()
        ->view('sitemap', [], 200)
        ->header('Content-Type', 'application/xml');
})->name('sitemap');
