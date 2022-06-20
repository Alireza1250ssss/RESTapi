<?php

use App\Http\Controllers\RelationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user',UserController::class);

// Route::get("user",[UserController::class,'index'])->name('user.index');
// Route::get("user/{user}",[UserController::class,'show'])->name('user.show');
// Route::post("user/",[UserController::class,'store'])->name('user.store');
// Route::put("user/{user}",[UserController::class,'update'])->name('user.update');
// Route::delete("user/{user}",[UserController::class,'destroy'])->name('user.destroy');
Route::delete('user/{user}/force',[UserController::class,"forceDelete"])->name('user.forceDelete')->withTrashed()
->middleware('test');
Route::put('user/{user}/restore',[UserController::class,"restore"])->name('user.restore')->withTrashed();
//user 

//create ---> post ---> store ---> /user 
//update ---> put/patch --->  update ---> /user
//delete ---> delte ---> destroy ---> /user/12
// show ---> get ----> show ---> /user/5
//get all resources ---> get ---> index ---> /user


// -----> /user

Route::apiResource('country',RelationController::class);