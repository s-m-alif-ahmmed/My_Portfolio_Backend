<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Education\EducationController;

// Education routes
Route::get('/education/list',[EducationController::class, 'index']);
Route::get('/education/show/{id}',[EducationController::class, 'show']);
