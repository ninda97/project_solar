<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\AlertGroup;
use App\Models\TrxTicket;

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


Route::get('/alertgroup', function () {

    return AlertGroup::all();

    var_dump(AlertGroup: all());
});

Route::put('/alertgroup', function () {

    if (request('status') == 'Down') {
        TrxTicket::create([
            'alertid' => request('alertid'),
            'chatid' => request('chatid'),
            'title' => 'Server Down',
            'tickettype' => 'Incident'
        ]);
    }

    return AlertGroup::create([
        'alertid' => request('alertid'),
        'nodename' => request('nodename'),
        'nodeipaddress' => request('nodeipaddress'),
        'nodegroup' => request('nodegroup'),
        'location' => request('location'),
        'cpuload' => request('cpuload'),
        'memoryused' => request('memoryused'),
        'status' => request('status'),
        'alertmessage' => request('alertmessage'),
        'chatid' => request('chatid')
    ]);
});
