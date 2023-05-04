<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PassportController;



Route::post('register',[PassportController::class,'register']);
Route::post('login',[PassportController::class,'login']);
Route::middleware(['auth:api'])->group(function(){
   
    Route::get('userInfo',[PassportController::class,'userInfo']);
    Route::resource('vehicle',VehicleController::class);

});



