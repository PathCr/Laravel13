<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SiteController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', function (Request $request) { return $request->user(); });
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('sites', SiteController::class);
});
