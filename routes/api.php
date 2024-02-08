<?php

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('files', [FileController::class, 'upload']);
Route::get('files/{file}', [FileController::class, 'download']);
