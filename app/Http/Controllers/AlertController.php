<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->select('chatid')
            ->where('chatid', auth()->user()->chatid)
            ->first();

        if (request()->ajax()) {
            if ((auth()->user()->chatid != '' || auth()->user()->chatid != null) && $users->chatid == auth()->user()->chatid) {

                if (!empty($request->from_date)) {
                    $data = DB::table('alertgroup')
                        ->select(
                            'alertgroup.*',
                            'alertgroup.alertid as al',
                            'users.name',
                            'status.description as description'
                        )
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.description', '=', 'alertgroup.status')
                        ->whereBetween('alertgroup.created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59'])
                        ->where('users.chatid', auth()->user()->chatid)
                        ->orderBy('alertgroup.created_at', 'DESC')
                        ->get();
                } else {
                    $data = DB::table('alertgroup')
                        ->select(
                            'alertgroup.*',
                            'alertgroup.alertid as al',
                            'users.name',
                            'status.description as description'
                        )
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.description', '=', 'alertgroup.status')
                        ->where('users.chatid', auth()->user()->chatid)
                        ->orderBy('alertgroup.created_at', 'DESC')
                        ->get();
                }
            } else {
                if (!empty($request->from_date)) {
                    $data = DB::table('alertgroup')
                        ->select(
                            'alertgroup.*',
                            'alertgroup.alertid as al',
                            'users.name',
                            'status.description as description'
                        )
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.description', '=', 'alertgroup.status')
                        ->whereBetween('alertgroup.created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59'])
                        ->orderBy('alertgroup.created_at', 'DESC')
                        ->get();
                } else {
                    $data = DB::table('alertgroup')
                        ->select(
                            'alertgroup.*',
                            'alertgroup.alertid as al',
                            'users.name',
                            'status.description as description'
                        )
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.description', '=', 'alertgroup.status')
                        ->get();
                }
            }
            return datatables()->of($data)
                ->addColumn('alertid', function ($data) {
                    $cobs = strval($data->al);
                    return $cobs;
                })
                ->rawColumns(['alertid'])
                ->make(true);
        }

        return view('data-alert');
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
        //
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
