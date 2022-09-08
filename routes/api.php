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

    $ticket = DB::table('trx_ticket')
    ->where('alertid', '=', request('alertid'))
    ->get();
    
    $status = DB::table('status')
    ->where('id', '=', request('status'))
    ->where('iscreated', '=', 1)
    ->get();

    if(count($status) > 0 && count($ticket) == 0){
        TrxTicket::create([
            'alertid' => request('alertid'),
            'chatid' => request('chatid'),
            'source' => 'AutoTicket',
            'description' => request('alertmessage'),
            'outletcode' => 000,
            'outletreported' => 'Head Office',
            'module' => 'Hardware',
            'submodule' => 'Hardware',
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
