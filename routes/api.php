<?php

use App\Http\Controllers\GlobalApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(GlobalApiController::class)->group(function () {
    Route::get('/province', 'getProvince');
    Route::get('/regency', 'getRegency');
    Route::get('/district', 'getDistrict');
    Route::get('/district-with-province', 'getDistrictWithProvince');
});
