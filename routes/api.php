<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SiteController;
use App\Http\Controllers\Api\WidgetController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', function (Request $request) { return $request->user(); });
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('sites', SiteController::class);
});

Route::get('/widget/{publicKey}/reviews', [WidgetController::class, 'reviews']);
Route::post('/widget/{publicKey}/reviews', [WidgetController::class, 'store']);
