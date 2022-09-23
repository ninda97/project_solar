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
        $this->middleware('permission:ticket-list', ['only' => ['index']]);
        $this->middleware('permission:ticket-show', ['only' => ['show']]);
        $this->middleware('permission:ticket-update', ['only' => ['update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $return = DB::table('trx_ticket')
        //     ->select('trx_ticket.*', 'trx_ticket.id', 'users.name')
        //     ->leftjoin('users', 'users.chatid', '=', 'trx_ticket.chatid')
        //     ->leftjoin('alertgroup', 'alertgroup.alertid', '=', 'trx_ticket.alertid')
        //     ->orderBy('trx_ticket.created_at')
        //     ->get();

        $users = DB::table('users')
            ->select('chatid')
            ->where('chatid', auth()->user()->chatid)
            ->first();
        $data = "";

        if (request()->ajax()) {
            if ((auth()->user()->chatid != '' || auth()->user()->chatid != null) && $users->chatid == auth()->user()->chatid) {
                if (!empty($request->from_date)) {

                    $data = DB::table('trx_ticket')
                        ->select('trx_ticket.*', 'trx_ticket.id', 'users.name')
                        ->leftjoin('users', 'users.chatid', '=', 'trx_ticket.chatid')
                        ->leftjoin('alertgroup', 'alertgroup.alertid', '=', 'trx_ticket.alertid')
                        ->whereBetween('alertgroup.created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59'])
                        ->where('users.chatid', auth()->user()->chatid)
                        // ->groupBy('trx_ticket.id', 'trx_ticket.alertid')
                        ->orderBy('trx_ticket.created_at', 'DESC')
                        ->get();
                } else {
                    $data = DB::table('trx_ticket')
                        ->select('trx_ticket.*', 'trx_ticket.id', 'users.name')
                        ->leftjoin('users', 'users.chatid', '=', 'trx_ticket.chatid')
                        ->leftjoin('alertgroup', 'alertgroup.alertid', '=', 'trx_ticket.alertid')
                        ->where('users.chatid', auth()->user()->chatid)
                        // ->groupBy('trx_ticket.id', 'trx_ticket.alertid')
                        ->orderBy('trx_ticket.created_at', 'DESC')
                        ->get();
                }
            } else {
                if (!empty($request->from_date)) {
                    $data = DB::table('trx_ticket')
                        ->select('trx_ticket.*', 'trx_ticket.id', 'users.name')
                        ->leftjoin('users', 'users.chatid', '=', 'trx_ticket.chatid')
                        ->leftjoin('alertgroup', 'alertgroup.alertid', '=', 'trx_ticket.alertid')
                        ->whereBetween('alertgroup.created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59'])
                        // ->groupBy('trx_ticket.id', 'trx_ticket.alertid')
                        ->orderBy('trx_ticket.created_at', 'DESC')
                        ->get();
                } else {
                    error_log("masukkkk");
                    $data = DB::table('trx_ticket')
                        ->select('trx_ticket.*', 'trx_ticket.id', 'users.name')
                        ->leftjoin('users', 'users.chatid', '=', 'trx_ticket.chatid')
                        ->leftjoin('alertgroup', 'alertgroup.alertid', '=', 'trx_ticket.alertid')
                        // ->groupBy('trx_ticket.id', 'trx_ticket.alertid')
                        ->orderBy('trx_ticket.created_at', 'DESC')
                        ->get();
                }
            }
            return datatables()->of($data)
                ->addColumn('Detail', function ($data) {
                    $button = "<a href='trx_ticket/show/" . $data->id . "' class='btn btn-primary m-2'> 
                    <i class='fas fa-info-circle'></i> </a>";
                    return $button;
                })
                ->rawColumns(['Detail'])
                ->make(true);
        }

        return view('ticket');
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
