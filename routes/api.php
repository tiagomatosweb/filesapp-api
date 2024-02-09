<?php

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('files', [FileController::class, 'index']);
Route::post('files', [FileController::class, 'upload']);
Route::get('files/{file}', [FileController::class, 'download']);
Route::delete('files/{file}', [FileController::class, 'delete']);
