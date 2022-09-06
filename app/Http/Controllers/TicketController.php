<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrxTicket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-edit', ['only' => ['index']]);
        // $this->middleware('permission:user-edit', ['only' => ['edit', 'update', 'show']]);
    }

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
        $users = User::all();

        return view('ticket', [
            'trx_tickets' => $return,
            'users'  => $users
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
            ->select('trx_ticket.*', 'trx_ticket.id', 'users.name', 'alertgroup.*')
            ->leftjoin('users', 'users.chatid', '=', 'trx_ticket.chatid')
            ->leftjoin('alertgroup', 'alertgroup.alertid', '=', 'trx_ticket.alertid')
            ->where('trx_ticket.id', $id)
            ->first();
        $users = User::all();

        return view('each-ticket', [
            'ticket' => $ticket, 'users'  => $users
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TrxTicket $ticket)
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

        $user_chatid = User::where('name', $request->username)->value('chatid');
        // Store Data

        $ticket_updated = TrxTicket::whereId($id)->update([
            'chatid' => $user_chatid
        ]);
        return redirect()->route('trx_ticket.index')->with('success', 'PIC updated successfully.');
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
