<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\SubLineController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DesingController;
use Illuminate\Support\Facades\Route;


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
Route::middleware('auth:sanctum')->prefix('line')->group(function () {
    Route::get("/",[LineController::class,'index']);
    Route::post("/create",[LineController::class,'store']);
    Route::post("/update",[LineController::class,'update']);
    Route::delete("/delete/{id}",[LineController::class,'destroy']);
});


//sublineas
Route::middleware('auth:sanctum')->prefix('sublines')->group(function () {
    Route::get("/",[SubLineController::class,'index']);
    Route::post("/create",[SubLineController::class,'store']);
    Route::post("/update",[SubLineController::class,'update']);
    Route::delete("/delete/{id}",[SubLineController::class,'destroy']);
});

//productos
Route::middleware('auth:sanctum')->prefix('products')->group(function () {
    Route::get("/",[ProductController::class,'index']);
    Route::post("/create",[ProductController::class,'store']);
    Route::post("/update",[ProductController::class,'update']);
    Route::delete("/delete/{id}",[ProductController::class,'destroy']);

});

//Diseños
Route::middleware('auth:sanctum')->prefix('desing')->group(function () {
    Route::get("/",[DesingController::class,'index']);
    Route::post("/create",[DesingController::class,'store']);
    Route::post("/update",[DesingController::class,'update']);
    Route::delete("/delete/{id}",[DesingController::class,'destroy']);
});


//Productos cliente
Route::prefix('products-client')->group(function () {
    
    Route::get("/line/active",[LineController::class,'findActive']);
    Route::get("/{id}",[ProductController::class,'singleProduct']);
    Route::get("/listall/{linesid}",[ProductController::class,'listProductsClient']);
    //Route::get("/line/home",[LineController::class,'lineHomeUser']);
    Route::get("/subline/home",[SubLineController::class,'sublineHomeUser']);
    Route::get("/desing/home",[DesingController::class,'desingHomeUser']);
    Route::get("/desing/alldesings",[DesingController::class,'allDesingUser']);
    

});







