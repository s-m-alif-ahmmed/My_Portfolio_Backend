<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Education\EducationController;
use App\Http\Controllers\API\Experience\ExperienceController;

// Education routes
Route::get('/education/list',[EducationController::class, 'index']);
Route::get('/education/show/{id}',[EducationController::class, 'show']);

// Experience routes
Route::get('/experience/list',[ExperienceController::class, 'index']);
Route::get('/experience/show/{id}',[ExperienceController::class, 'show']);
