<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index'])->name('landing');
Route::get('/project/{slug}', [PortfolioController::class, 'showProject'])->name('project.show');
