<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\SubLineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login']);

//lineas
Route::/*middleware('auth:sanctum')->*/prefix('line')->group(function () {
    Route::get("/",[LineController::class,'index']);
    Route::post("/create",[LineController::class,'store']);
    Route::post("/update",[LineController::class,'update']);
    Route::delete("/delete/{id}",[LineController::class,'destroy']);
});
Route::get("/line/active",[LineController::class,'findActive']);

//sublineas
Route::/*middleware('auth:sanctum')->*/prefix('sublineas')->group(function () {
    Route::get("/",[SubLineController::class,'index']);
    Route::post("/crear",[SubLineController::class,'store']);
});



Route::get('/routeImg', function (Request $request) {
    // return Storage::url("2gyRCOT4GPMm7VnGadh0vfca6YhiQEgPkKW3Q81Z.jpg");
    return storage_path() ;
});

