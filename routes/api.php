<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\AlertGroup;
use App\Models\TrxTicket;
use App\Models\Status;

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

    
    $return = DB::table('alertgroup')
    ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
    ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
    ->get();

    return($return);

});

Route::put('/alertgroup', function() {

    error_log(request());

    $result = AlertGroup::create([
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
    
    if(request('status') == 2){
        error_log('masukkk');
        TrxTicket::create([
            'alertid' => request('alertid'),
            'chatid' => request('chatid'),
            'title' => 'Server Down',
            'tickettype' => 'Incident'
        ]);
    }

    return($result);

});

Route::get('/ticket', function() {

    $return = DB::table('trx_ticket')
    ->join('users', 'users.chatid', '=', 'trx_ticket.chatid')
    ->get();

    return($return);

});

Route::get('/ticket/{id}', function($id) {

    $return = DB::table('trx_ticket')
    ->join('users', 'users.chatid', '=', 'trx_ticket.chatid')
    ->where('trx_ticket.chatid', '=', $id)
    ->get();

    return($return);

});
