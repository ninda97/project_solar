<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrxTicket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $return = DB::table('trx_ticket')
            ->select('trx_ticket.*', 'trx_ticket.id', 'users.name')
            ->leftjoin('users', 'users.chatid', '=', 'trx_ticket.chatid')
            ->leftjoin('alertgroup', 'alertgroup.alertid', '=', 'trx_ticket.alertid')
            ->orderBy('trx_ticket.created_at')
            ->get();
        // ->paginate(1);

        return view('ticket', [
            'trx_tickets' => $return
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = DB::table('trx_ticket')
            ->join('users', 'users.chatid', '=', 'trx_ticket.chatid')
            ->where('trx_ticket.ticketid', $id)
            ->join('alertgroup', 'alertgroup.chatid', '=', 'trx_ticket.chatid')
            ->where('trx_ticket.id', $id)
            ->first();

        return view('each-ticket', compact('ticket'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
