<?php

use App\Http\Controllers\Api\studentcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::get('student',[studentcontroller::class,'index']);
 Route::post('student',[studentcontroller::class,'store']);
 Route::get('student/{id}',[studentcontroller::class,'show']);
 Route::get('student/{id}/edit',[studentcontroller::class,'edit']);
 Route::put('student/{id}/edit',[studentcontroller::class,'update']);
 Route::delete('student/{id}/delete',[studentcontroller::class,'delete']);
