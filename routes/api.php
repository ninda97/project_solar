<?php

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


Route::get('/alertgroup', function() {
    
    return AlertGroup::all();

});

Route::put('/alertgroup', function() {
    return AlertGroup::create([
        'alertid' => request('alertid'),
        'nodename' => request('nodename'),
        'nodeipaddress' => request('nodeipaddress'),
        'location' => request('location'),
        'cpuload' => request('cpuload'),
        'memoryused' => request('memoryused'),
        'status' => request('status')
    ]);
});